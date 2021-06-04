<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chungchi;
use App\khoahoc;
use DB;
use Carbon\Carbon;
use App\lophoc;
use App\lop;
use App\hocviendangky;
use App\lopthi;
class AjaxController extends Controller
{
    public function getTenKhoahoc($id){
    	$khoahoc = DB::table('khoa')->join('khoahoc','khoahoc.ID_Khoa','khoa.ID')
                    ->select('khoahoc.ID as ID','TenKhoa')
                    ->where('khoa.ID', $id)
                    ->get();
    	echo "<option value=''></option>";
    	foreach ($khoahoc as $khoahoc) {
    		echo "<option value='{$khoahoc->ID}'>{$khoahoc->TenKhoa}</option>";
    	}
    }

    public function getBanghocvien($id){
    	$xetduyet = DB::select('SELECT  hocvien.* , ketquathi.KetQua, danhsachthi.ID as SBD,lopthi.ThoiGianThi,XetDuyet ,hocviendangky.ID as ID
                                FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND danhsachthi.TrangThai = "Đã Nhập Điểm"
                                    AND lopthi.ID = ?
                                ORDER BY ketquathi.ThoiGian DESC',[$id]);
    	return view('ajax.banghocvien',compact('xetduyet'));
    }

    public function getBanghocvienchungchi(){
        $xetduyet = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, khoahoc.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai,  hocviendangky.XetDuyet as XetDuyet
                                FROM hocviendangky, hocvien, lop, ketquathi,khoahoc
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND lop.ID = ketquathi.ID_Lop
                                    AND hocviendangky.ID_Khoa = khoahoc.ID
                                    AND lop.TrangThai = "Đã Nhập Điểm"
                                    AND hocviendangky.XetDuyet = "Chờ duyệt"
                                ORDER BY ketquathi.ThoiGian DESC');
        return view('ajax.banghocvienchungchi',compact('xetduyet'));
    }

    public function getChitiethocvien(Request $req,$id){
        
            $chitiethocvien = DB::select('SELECT hocviendangky.*, hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh, hocvien.NoiSinh, lopthi.ThoiGianThi as ThoiGianThi, ketquathi.KetQua as KetQua,lophoc.TenLop
                                        FROM hocvien, hocviendangky,lopthi,ketquathi,lophoc,lop,danhsachthi
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                           AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                           AND danhsachthi.ID_LopThi = lopthi.ID
                                           AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                           AND hocviendangky.ID = lop.ID_HocVienDK
                                           AND lop.ID_LopHoc = lophoc.ID
                                           AND hocviendangky.ID =?',[$id]);
            $chungchi = chungchi::all();
            $idhocvien = hocviendangky::where("ID",$id)->get();
            $kiemtraduyet = hocviendangky::where("ID",$id)->first();
            $html= view('ajax.modalchitiethocvien',compact('chitiethocvien','chungchi','idhocvien','kiemtraduyet'))->render();            
            return response([
                'html'=>$html
            ]);        
        
        
    }

    public function getBangxetduyethocvien($id){
        $xetduyet = DB::select('SELECT  hocvien.* , ketquathi.KetQua, danhsachthi.ID as SBD,lopthi.ThoiGianThi,XetDuyet ,hocviendangky.ID as ID
                                FROM hocviendangky, hocvien, lopthi, ketquathi,danhsachthi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND danhsachthi.TrangThai = "Đã Nhập Điểm"
                                    AND lopthi.ID = ?
                                ORDER BY ketquathi.ThoiGian DESC',[$id]);
        return view('ajax.bangxetduyethocvien',compact('xetduyet'));
    }

    public function getBangxetduyethocvienchungchi(){
        $xetduyet = DB::select('SELECT DISTINCT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, khoahoc.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai, hocviendangky.XetDuyet as XetDuyet
                                FROM hocviendangky, hocvien, lop, ketquathi,khoahoc, chungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND lop.ID = ketquathi.ID_Lop
                                    AND hocviendangky.ID_Khoa = khoahoc.ID
                                ORDER BY hocviendangky.ThoiGian DESC');
        return view('ajax.bangxetduyethocvien',compact('xetduyet'));
    }

     public function getXetduyethocvien(Request $req,$id){
        if ($req->ajax()) {
            $chitiethocvien = DB::select('SELECT hocviendangky.*, hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh, hocvien.NoiSinh, lopthi.ThoiGianThi as ThoiGianThi, ketquathi.KetQua as KetQua,lophoc.TenLop
                                        FROM hocvien, hocviendangky,lopthi,ketquathi,lophoc,lop,danhsachthi
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                           AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                           AND danhsachthi.ID_LopThi = lopthi.ID
                                           AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                           AND hocviendangky.ID = lop.ID_HocVienDK
                                           AND lop.ID_LopHoc = lophoc.ID
                                           AND hocviendangky.ID =?',[$id]);
            $kiemtraduyet = hocviendangky::where("ID",$id)->get();
            $hocvien = DB::select('SELECT hocviendangky.ID as ID
                                        FROM hocvien, hocviendangky,lopthi,ketquathi,lophoc,lop,danhsachthi
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                           AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                           AND danhsachthi.ID_LopThi = lopthi.ID
                                           AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                           AND hocviendangky.ID = lop.ID_HocVienDK
                                           AND lop.ID_LopHoc = lophoc.ID
                                           AND hocviendangky.ID =?',[$id]);
            $html= view('ajax.modalxetduyethocvien',compact('chitiethocvien','kiemtraduyet','hocvien'))->render();
            // dd($html);
            return response([
                'html'=>$html
            ]);        
        }
        
    }
    // public function getBanglophoc($id){
    //     $lophoc = DB::select('call chitietlophoc(?)',array($id));
    //     return view('ajax.banglophoc',compact('lophoc'));
    // }
    // public function getBangdotcaplophoc($idcc, $iddc){
    //     $lophoc = DB::select('call chitietdotcaplophoc(?,?)',array($idcc,$iddc));
    //     return view('ajax.banglophoc',compact('lophoc'));
    // }

    // public function getCapPhat(Request $req,$id){
    //     if ($req->ajax()) {
    //         $chitiethocvien = DB::table('xetduyet')->join('dotcap','xetduyet.ID_DotCap','dotcap.ID')->join('chungchi','xetduyet.ID_ChungChi','chungchi.ID')->where('xetduyet.ID',$id)->get();
    //         $kiemtraduyet = xetduyet::where("ID",$id)->get();
    //         $hocvien = DB::table('chungchi')->join('xetduyet','xetduyet.ID_ChungChi','chungchi.ID')->where('xetduyet.ID',$id)->select('xetduyet.ID as ID')->get();
    //         $html= view('ajax.modalxetduyethocvien',compact('chitiethocvien','hocvien','kiemtraduyet'))->render();
    //         return response([
    //             'html'=>$html
    //         ]);        
    //     }
        
    // }

     public function getBangcapphatvanbang($id){
        $xetduyet = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, khoahoc.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai, hocviendangky.XetDuyet as XetDuyet, hocviendangky.NgayKy as NgayKy, hocviendangky.SoHieu as SoHieu, hocviendangky.SoVaoSo as SoVaoSo
                                FROM hocviendangky, hocvien, lop, ketquathi,khoahoc,chungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND lop.ID = ketquathi.ID_Lop
                                    AND hocviendangky.ID_Khoa = khoahoc.ID
                                    AND chungchi.ID = khoahoc.ID_ChungChi
                                    AND hocviendangky.XetDuyet = "Đã duyệt"
                                    AND chungchi.ID = ?
                                ORDER BY hocviendangky.ThoiGian DESC',[$id]);
        return view('ajax.bangcapphatvanbang',compact('xetduyet'));
    }
   
    public function getCapphatvanbang(Request $req,$id){
       if ($req->ajax()) {
            $chitiethocvien = DB::select('SELECT hocviendangky.ID as ID ,hocviendangky.SoHieu as SoHieu, hocviendangky.SoVaoSo as SoVaoSo, hocviendangky.NgayKy as NgayKy, hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, khoahoc.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai,lophoc.TenLop as TenLop
                                        FROM hocvien, hocviendangky,khoahoc,lop,ketquathi,lophoc
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                            AND khoahoc.ID = hocviendangky.ID_Khoa
                                            AND hocviendangky.ID = lop.ID_HocVienDK
                                            AND lop.ID = KetQuaThi.ID_Lop
                                            AND lop.ID_LopHoc = lophoc.ID
                                            AND hocviendangky.ID =?
                                        ORDER BY hocviendangky.ThoiGian DESC',[$id]);
            $kiemtraduyet = hocviendangky::where("ID",$id)->get();
            $hocvien = DB::select('SELECT hocviendangky.ID as ID
                                        FROM hocvien, hocviendangky,khoahoc,lop,ketquathi,lophoc
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                            AND khoahoc.ID = hocviendangky.ID_Khoa
                                            AND hocviendangky.ID = lop.ID_HocVienDK
                                            AND lop.ID = KetQuaThi.ID_Lop
                                            AND lop.ID_LopHoc = lophoc.ID
                                            AND hocviendangky.ID =?',[$id]);
            $html= view('ajax.modalcapphatvanbang',compact('chitiethocvien','kiemtraduyet','hocvien'))->render();
            return response([
                'html'=>$html
            ]);        
        }
        
    }
    public function getHocvienlophoc($id){

        $lophoc = DB::select('SELECT HoTenHV,GioiTinh,NgaySinh,NoiSinh,SDT,TenLop,hocviendangky.ID as ID, hocviendangky.TrangThai as TrangThai
                                    FROM hocvien,hocviendangky,lop,lophoc
                                    WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                        AND hocviendangky.ID = lop.ID_HocVienDK
                                        AND lop.ID_LopHoc = lophoc.ID
                                        AND lophoc.ID =?
                                    ORDER BY TrangThai DESC',[$id]);
        return view('ajax.banghocvienlophoc',compact('lophoc'));
    }

    public function getHocvienkhoahoc($id){

        // $lophoc = DB::select('SELECT lophoc.ID as ID ,HoTenHV,GioiTinh,NgaySinh,NoiSinh,SDT,lopchungchi.TenLop as TenLop, hocviendangky.TrangThai as TrangThai
        //                             FROM hocvien,hocviendangky,lophoc,lopchungchi
        //                             WHERE   hocvien.ID = hocviendangky.ID_HocVien
        //                                 AND hocviendangky.ID = lophoc.ID_HocVienDK
        //                                 AND hocviendangky.ID_Lop = lopchungchi.ID
                                        
        //                                 AND lopchungchi.ID =?',[$id]);
         $khoahoc = DB::select("SELECT hocvien.*, hocviendangky.TrangThai as TrangThai, hocviendangky.ID as ID
                                FROM hocvien,hocviendangky,khoahoc,lop
                                WHERE 	hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND hocviendangky.TrangThai = 'Đã Đóng Học Phí'
                                    AND khoahoc.ID=?
                                ORDER BY hocvien.HoTenHV",[$id]);
        return view('ajax.banghocvienkhoahoc',compact('khoahoc'));
    }
    public function bangdanhapdiem($id){
         $loailophoc = DB::select('SELECT  TenChungChi
                                    FROM lopthi,chungchi
                                    WHERE lopthi.ID_ChungChi = chungchi.ID
                                        AND lopthi.ID = ?',[$id]);
         $hocvien = DB::select("SELECT hocvien.*,ketquathi.*,danhsachthi.ID as ID 
                                FROM hocvien,hocviendangky,danhsachthi,lopthi,ketquathi
                                WHERE hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                    AND danhsachthi.TrangThai = 'Đã Nhập Điểm'
                                    AND lopthi.ID =? ",[$id]);
        $chungchi = chungchi::all();
        return view('ajax.bangdanhapdiem',compact('hocvien','loailophoc','chungchi'));
    }
     public function bangchuanhapdiem($id){
        
        $loailophoc = DB::select('SELECT  TenChungChi
                                    FROM lopthi,chungchi
                                    WHERE lopthi.ID_ChungChi = chungchi.ID
                                        AND lopthi.ID = ?',[$id]);
        $hocvien = DB::select("SELECT hocvien.*,danhsachthi.ID as ID
                                FROM hocvien,hocviendangky,danhsachthi,lopthi
                                WHERE hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND danhsachthi.TrangThai = 'Chưa Nhập Điểm'
                                    AND lopthi.ID =? ",[$id]); 
        $chungchi = chungchi::all();
        return view('ajax.bangchuanhapdiem',compact('hocvien','loailophoc','chungchi'));
    }
    public function getTenlop($id){
        $lophoc = DB::table('khoahoc')->join('lophoc','lophoc.ID_KhoaHoc','khoahoc.ID')
					->select('lophoc.ID as ID','TenLop')
					->where('khoahoc.ID', $id)
					->get();
                    echo "<option value=''>-- Chọn lớp học --</option>";
        foreach ($lophoc as $lophoc) {
            echo "<option value='{$lophoc->ID}'>{$lophoc->TenLop}</option>";
        }
        
    }
    public function getTenkhoa($id){
        $khoahoc = DB::table('khoahoc')->join('chungchi','chungchi.ID','khoahoc.ID_ChungChi')
					->select('khoahoc.ID as ID','TenKhoa')
					->where('chungchi.ID', $id)
					->get();
                    echo "<option value=''>-- Chọn khóa học --</option>";
        foreach ($khoahoc as $khoahoc) {
            echo "<option value='{$khoahoc->ID}'>{$khoahoc->TenKhoa}</option>";
        }
        
    }
     public function getTenlophp($id){
        $lophocphan = DB::table('lophocphan')->join('lophoc','lophoc.ID','lophocphan.ID_LopHoc')
                    ->select('lophocphan.ID as ID','lophocphan.TenLop as TenLop')
                    ->where('lophoc.ID', $id)
                    ->get();
                    echo "<option value=''>-- Chọn lớp học phần --</option>";
        foreach ($lophocphan as $lophoc) {
            echo "<option value='{$lophoc->ID}'>{$lophoc->TenLop}</option>";
        }
        
    }

    public function getTenlopthi($id){
        $lopthi = DB::table('lopthi')->join('chungchi','chungchi.ID','lopthi.ID_ChungChi')
                    ->select('lopthi.ID as ID','lopthi.TenLopThi as TenLopThi')
                    ->where('chungchi.ID', $id)
                    ->get();
                    echo "<option value=''>-- Chọn lớp thi --</option>";
        foreach ($lopthi as $lt) {
            echo "<option value='{$lt->ID}'>{$lt->TenLopThi}</option>";
        }
        
    }
    public function getLopthi($id){
        $lopthi = DB::table('chungchi')->join('khoahoc','chungchi.ID','khoahoc.ID_ChungChi')
                    ->join('lopthi','chungchi.ID','lopthi.ID_ChungChi')
                    ->select('lopthi.ID as ID','lopthi.TenLopThi as TenLopThi')
                    ->where('khoahoc.ID', $id)
                    ->get();
                    echo "<option value=''>-- Chọn lớp thi --</option>";
        foreach ($lopthi as $lt) {
            echo "<option value='{$lt->ID}'>{$lt->TenLopThi}</option>";
        }
        
    }
    public function getDangkylophoc(Request $req , $id){
        if ($req->ajax()) {
        $lophoc = DB::table('lophoc')->join('khoahoc','khoahoc.ID','lophoc.ID_KhoaHoc')
                                        ->select('lophoc.ID as ID','TenKhoa','TenLop')
                                        ->where('lophoc.ID',$id)->get();
        $html= view('ajax.modaldangkylophoc',compact('lophoc'))->render();
        return response([
            'html'=>$html
        ]);        
        }

    }

    public function getBanglophoc($id){
        $lophoc = DB::table('lophoc')->join('khoahoc','khoahoc.ID','lophoc.ID_KhoaHoc')
                                        ->where('khoahoc.ID',$id)->get();
        return view('ajax.banglophoc',compact('lophoc'));
    }
    public function getBanglopchinhthuc($id){
        $lophoc = DB::select("SELECT hocvien.*
                                FROM hocvien, hocviendangky, lophocphan, lophocchinhthuc
                                WHERE hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = lophocchinhthuc.ID_HocVienDK
                                    AND lophocchinhthuc.ID_LopHP = lophocphan.ID
                                    AND lophocphan.ID =? ",[$id]); 
        return view('ajax.banglopchinhthuc',compact('lophoc'));
    }


}
