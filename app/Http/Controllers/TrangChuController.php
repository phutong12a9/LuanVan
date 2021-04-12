<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thongbao;
use DB;
use Auth;
use Session;
use App\hocviendangky;
class TrangChuController extends Controller
{
    public function getTrangchu(){
    	$thongbao =DB::table('thongbao')->orderBy('ID','DESC')->get();
    	return view('trangchu.trangchu',compact('thongbao'));
    }

    public function getTracuuketquathi(){
    	return view('trangchu.tracuuketquathi');
    }

    public function getLienhe(){
    	return view('trangchu.lienhe');
    }

    public function getChitietthongbao($id){
        $chitietthongbao = thongbao::where('ID',$id)->get();
        return view('trangchu.chitietthongbao',compact('chitietthongbao'));
    }

    public function getChuyenmucthongbao($id){
        $chuyenmucthongbao = thongbao::where('ID_CM',$id)->orderBy('ID','DESC')->get();
        return view('trangchu.chuyenmucthongbao',compact('chuyenmucthongbao'));
    }

    public function getDangkychungchi(){

            if (Session::has('users')) {
                $iduser = Session('users')->ID; // ID người dùng
                $hocvien = DB::table('hocvien')->join('users','users.ID','hocvien.ID_User')->select('hocvien.ID as ID')->where('users.ID',$iduser)->get();
                $idhocvien = $hocvien[0]->ID; // Lấy ID học viên

                // truy vấn các lớp học mà học viên đã đăng ký
                $lopdadangky = DB::select('SELECT TenLop,BuoiHoc,NgayKhaiGiang,HocPhi,ThoiGianHoc,hocviendangky.ID as ID, hocviendangky.TrangThai as TrangThai
                                    FROM users,hocvien,hocviendangky,lopchungchi
                                    WHERE   users.ID = hocvien.ID_User
                                        AND hocvien.ID = hocviendangky.ID_HocVien
                                        AND hocviendangky.ID_Lop = lopchungchi.ID
                                        AND users.ID =?',[$iduser]);

                //truy vấn lớp học mà trung tâm đang mở
                $lophoc = DB::select('SELECT  lopchungchi.ID AS IDLopHoc ,lopchungchi.HocPhi,lopchungchi.TenLop ,lopchungchi.NgayKhaiGiang , lopchungchi.BuoiHoc, lopchungchi.ThoiGianHoc, lopchungchi.ThoiGianThi
                                FROM
                                    lopchungchi
                                WHERE   lopchungchi.TrangThai   = "Đang Mở"
                                    AND lopchungchi.ID NOT IN
                                (SELECT lopchungchi.ID
                                    FROM users,hocvien,hocviendangky,lopchungchi
                                    WHERE   users.ID = hocvien.ID_User
                                        AND hocvien.ID = hocviendangky.ID_HocVien
                                        AND hocviendangky.ID_Lop = lopchungchi.ID
                                        AND users.ID = ?)',[$iduser]);
            }

            else{
                $lopdadangky = "";
                $lophoc = DB::select('SELECT  lopchungchi.ID AS IDLopHoc ,lopchungchi.HocPhi,lopchungchi.TenLop ,lopchungchi.NgayKhaiGiang , lopchungchi.BuoiHoc, lopchungchi.ThoiGianHoc, lopchungchi.ThoiGianThi
                                FROM
                                    lopchungchi
                                WHERE lopchungchi.TrangThai   = "Đang Mở"
                                ');

            }

        return view('trangchu.dangkychungchi',compact('lophoc','lopdadangky'));
    }
    
    public function postDangkychungchi($id){

        if(Session::has('users')){
            $iduser = Session('users')->ID;
            $hocvien = DB::table('hocvien')->join('users','users.ID','hocvien.ID_User')->select('hocvien.ID as ID')->where('users.ID',$iduser)->get();
            $idhocvien = $hocvien[0]->ID;

            $hocviendangky = new hocviendangky;
            $hocviendangky->ID_HocVien = $idhocvien;
            $hocviendangky->ID_Lop = $id;
            $hocviendangky->TrangThai = "Chưa Đóng Học Phí";
            $hocviendangky->save();
            return redirect()->back()->with('dangkythanhcong','Đã đăng ký thành công.');
            
        }
        else{
            return redirect()->back()->with('dangkythatbai','Vui lòng đăng nhập.');
        }
    }
    public function getHuydangkychungchi($id){
        $delete = DB::delete('DELETE FROM hocviendangky WHERE ID =?',[$id]);
        return redirect()->back();
    }
}
