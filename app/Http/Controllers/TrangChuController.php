<?php

namespace App\Http\Controllers;

use App\hocviendangky;
use App\thongbao;
use DB;
use Session;
use Request;

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

	public function postDangkychungchi($id) {

		if (Session::has('users')) {
			$iduser = Session('users')->ID;
			$hocvien = DB::table('hocvien')->join('users', 'users.ID', 'hocvien.ID_User')->select('hocvien.ID as ID')->where('users.ID', $iduser)->get();
			$idhocvien = $hocvien[0]->ID;

			$hocviendangky = new hocviendangky;
			$hocviendangky->ID_HocVien = $idhocvien;
			$hocviendangky->ID_Lop = $id;
			$hocviendangky->TrangThai = "Chưa Đóng Học Phí";
			$hocviendangky->save();
			return redirect()->back()->with('dangkythanhcong', 'Đã đăng ký thành công.');

		} else {
			return redirect()->back()->with('dangkythatbai', 'Vui lòng đăng nhập.');
		}
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
