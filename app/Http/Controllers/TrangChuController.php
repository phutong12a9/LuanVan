<?php

namespace App\Http\Controllers;

use App\hocviendangky;
use App\hocvien;
use App\lop;
use App\thongbao;
use DB;
use Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TrangChuController extends Controller {
	public function getTrangchu() {
		$thongbao = DB::table('thongbao')->orderBy('ID', 'DESC')->get();
		return view('trangchu.trangchu', compact('thongbao'));
	}

	public function getTracuuketquathi() {
		return view('trangchu.tracuuketquathi');
	}

	public function getLienhe() {
		return view('trangchu.lienhe');
	}

	public function getChitietthongbao($id) {
		$chitietthongbao = thongbao::where('ID', $id)->get();
		return view('trangchu.chitietthongbao', compact('chitietthongbao'));
	}

	public function getChuyenmucthongbao($id) {
		$chuyenmucthongbao = thongbao::where('ID_CM', $id)->orderBy('ID', 'DESC')->get();
		return view('trangchu.chuyenmucthongbao', compact('chuyenmucthongbao'));
	}

	public function getDangkylophoc() {

			$khoahoc = DB::select('SELECT  khoahoc.ID AS IDKhoa ,khoahoc.*, Ten
                                FROM
                                    khoahoc,khoa
                                WHERE khoahoc.ID_Khoa = khoa.ID
                                		AND khoahoc.TrangThai   = "Đang Mở"
                                ');
		return view('trangchu.dangkychungchi', compact('khoahoc'));
	}

	public function postDangkylophoc(Request $req) {

			$hocvien = new hocvien;
			$hocvien->HoTenHV = $req->hoten;
			$hocvien->GioiTinh = $req->gioitinh;
			$hocvien->NgaySinh = Carbon::createFromFormat('d/m/Y', $req->ngaysinh)->format('Y-m-d');
			$hocvien->NoiSinh = $req->noisinh;
			$hocvien->SDT = $req->sdt;
			$hocvien->Email = $req->email;
			$hocvien->save();

			$hocviendangky = new hocviendangky;
			$hocviendangky->ID_HocVien = $hocvien->id;
			$hocviendangky->TrangThai = "Chưa Đóng Học Phí";
			$hocviendangky->ThoiGian = date('Y-m-d');
			$hocviendangky->save();

			$lop = new lop;
			$lop->ID_LopHoc = $req ->lop;
			$lop->ID_HocVienDK = $hocviendangky->id;
			$lop->TrangThai = "Chưa nhập điểm";
			$lop->save();
			return redirect()->route('dang-ky-lop-hoc')->with('dangkythanhcong', 'Đã đăng ký thành công.');
	}

	public function getHuydangkychungchi($id) {
		$delete = DB::delete('DELETE FROM hocviendangky WHERE ID =?', [$id]);
		return redirect()->back();
	}
    public function getDangkylop(Request $req,$id){
    // if ($req->ajax()) {
        $lophoc = DB::table('lophoc')->join('khoahoc','khoahoc.ID','lophoc.ID_KhoaHoc')
                                        ->select('lophoc.ID as ID','TenKhoa','TenLop')
                                        ->where('lophoc.ID',$id)->get();
        return view('trangchu.dangkylophoc',compact('lophoc'));
        // $html= view('ajax.modaldangkylophoc',compact('lophoc'))->render();
        // return response([
        //     'html'=>$html
        // ]);        
    // }

	}

}
