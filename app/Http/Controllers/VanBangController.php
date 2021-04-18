<?php

namespace App\Http\Controllers;

use App\chungchi;
use App\hocviendangky;
use App\Imports\XetDuyetImport;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExport;

class VanBangController extends Controller {
	public function getTracuuvanbang() {
		return view('vanbang.tracuuvanbang');
	}

	// public function getDotcapvanbang(){
	// 	$chungchi = chungchi::all();
	//     $vanbang = DB::table('chungchi')->join('dotcap','chungchi.ID','dotcap.ID_ChungChi')->where('TrangThai','Đang Mở')->get();
	//     return view('vanbang.dotcapvanbang',compact('chungchi','vanbang'));
	// }

	public function getThemvanbang(Request $req) {
		$chungchi = chungchi::all();
		$themchungchi = chungchi::all();
		return view('vanbang.themvanbang', compact('chungchi', 'themchungchi'));
	}

	public function postCapnhatvanbang(Request $req) {
		$this->validate($req,
			[
				'ct_ngayky' => 'required|date_format:"d/m/Y"', // bắt buộc
				'ct_sohieu' => 'required', // bắt buộc
				'ct_sovaoso' => 'required', // bắt buộc
			],
			[
				'ct_ngayky.required' => 'Ngày Ký Không Được Bỏ Trống',
				'ct_ngayky.date_format' => 'Ngày Ký Không Đúng Định Dạng',
				'ct_sohieu.required' => 'Số Hiệu Không Được Bỏ Trống.',
				'ct_sovaoso.required' => 'Số Vào Sổ Cấp Không Được Bỏ Trống.',
			]);
		$id = $req->ct_id;
		$xetduyet = new hocviendangky;
		$arr['NgayKy'] = Carbon::createFromFormat('d/m/Y', $req->ct_ngayky)->format('Y-m-d');
		$arr['SoHieu'] = $req->ct_sohieu;
		$arr['SoVaoSo'] = $req->ct_sovaoso;
		$arr['TrangThai'] = "Chờ duyệt";
		$arr['ThoiGian'] = date('Y-m-d');
		$xetduyet::where("ID", $id)->update($arr);
		return redirect()->back()->with('themthanhcong', 'Đã cập nhật thành công.');
	}
	public function getDuyetvanbang() {
		$chungchi = chungchi::all();
		return view('vanbang.duyetvanbang', compact('chungchi'));
	}

	public function postDuyethocvien(Request $req) {
		$id = $req->xd_id;
		$xetduyet = new hocviendangky;
		$arr['XetDuyet'] = "Đã duyệt";
		$arr['ThoiGian'] = date('Y-m-d');
		$xetduyet::where("ID", $id)->update($arr);
		return redirect()->route('duyet-van-bang')->with('xetduyetthanhcong', 'Đã xét duyệt thành công.');

	}

	public function postKhongduyethocvien(Request $req) {
		$id = $req->xd_id;
		$xetduyet = new hocviendangky;
		$arr['XetDuyet'] = "Không duyệt";
		$arr['ThoiGian'] = date('Y-m-d');
		$xetduyet::where("ID", $id)->update($arr);
		return redirect()->route('duyet-van-bang')->with('xetduyetthanhcong', 'Đã xét duyệt thành công.');

	}
	public function getCapphatvanbang() {
		$chungchi = chungchi::all();
		return view('vanbang.capphatvanbang', compact('chungchi'));
	}

	public function Invanbang($id) {
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->In_Van_Bang($id));
		return $pdf->stream();
	}

	public function In_Van_Bang($id) {
		$vanbang = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, khoahoc.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai, hocviendangky.XetDuyet as XetDuyet, hocviendangky.NgayKy as NgayKy, hocviendangky.SoHieu as SoHieu, hocviendangky.SoVaoSo as SoVaoSo, chungchi.TenChungChi as TenChungChi, DiemNghe, DiemNoi,DiemDoc,DiemViet,DiemLyThuyet,DiemThucHanh
                                FROM hocviendangky, hocvien, lop, ketquathi,khoahoc,chungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND lop.ID = ketquathi.ID_Lop
                                    AND hocviendangky.ID_Khoa = khoahoc.ID
                                    AND chungchi.ID = khoahoc.ID_ChungChi
                                    AND hocviendangky.ID = ?', [$id]);
		$in = '';
		$in = '<style type="text/css">
                    body{
                        font-family: DejaVu Sans;
                    }
                </style>
                <div style=" margin-left: 255px; font-size: 18px"><b>' . $vanbang[0]->TenChungChi . '</b></div>
                <div style="margin-top:40px; margin-left: 200px; font-size: 14px"><b>' . $vanbang[0]->HoTenHV . '<b></div>
                <div>
                    <b style="margin-top:31px; margin-left: 255px; font-size: 14px">' . $vanbang[0]->NgaySinh . '<b>
                    <b style="margin-left: 255px; font-size: 14px">' . $vanbang[0]->NoiSinh . '<b></p>
                </div>
                <div style="margin-top:62px; margin-left: 30px; font-size: 14px"><b>Trung Tâm Ngoại Ngữ Tin-Học Trường Đại Học Kỹ Thuật Công Nghệ Cần Thơ<b></div>
                <div>
                    <b style="margin-top:31px; margin-left: 160px; font-size: 14px">8.0<b>
                    <b style="margin-left: 450px; font-size: 14px">8.0<b>
                </div>
                <div>
                    <b style="margin-top:31px; margin-left: 350px; font-size: 14px">Cần Thơ<b>
                    <b style="margin-left: 61px; font-size: 14px">' . date("d") . '<b>
                    <b style="margin-left: 61px; font-size: 14px">' . date("m") . '<b>
                    <b style="margin-left: 61px; font-size: 14px">' . date("y") . '<b>
                </div>
                <div style="margin-top:83px; margin-left: 106px; font-size: 14px;color: red"><b>' . $vanbang[0]->SoHieu . '</b></div>
                <div style="margin-top:31; margin-left: 232px; font-size: 14px;"><b>' . $vanbang[0]->SoVaoSo . '</b></div>

        ';
		return $in;
	}
	public function postImport(Request $req) {
		if ($req->hasFile('file')) {

			// validate incoming request
			$this->validate($req, [
				'file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
			]);

			if ($req->file('file')->isValid()) {
				Excel::import(new XetDuyetImport, request()->file('file'));

			}
		}
		return redirect()->back()->with('themthanhcong', 'Đã thêm mới thành công.');
	}
	public function Excelexport(Request $req) {
		$type = $req->type;
		return Excel::download(new ExcelExport, 'users.xlsx');

	}
}
