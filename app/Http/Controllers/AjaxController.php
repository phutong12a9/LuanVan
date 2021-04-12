<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dotcap;
use App\chungchi;
use App\lopchungchi;
use DB;
use Carbon\Carbon;
use App\lophocphan;
use App\hocviendangky;
class AjaxController extends Controller
{
    // public function getChondotcap($id){
    // 	$dotcap = dotcap::where('ID_ChungChi',$id)->get();
    // 	echo "<option value=''>-- Chọn Đợt Cấp --</option>";
    // 	foreach ($dotcap as $dotcap) {
    // 		echo "<option value='{$dotcap->ID}'>{$dotcap->TenDotCap}</option>";
    // 	}
    // }

    public function getBanghocvien($id){
    	$xetduyet = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, lopchungchi.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai, hocviendangky.XetDuyet as XetDuyet
                                FROM hocviendangky, hocvien, lophoc, ketquathi,lopchungchi,chungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lophoc.ID_HocVienDK
                                    AND lophoc.ID = ketquathi.ID_LopHoc
                                    AND hocviendangky.ID_Lop = lopchungchi.ID
                                    AND chungchi.ID = lopchungchi.ID_ChungChi
                                    AND lophoc.TrangThai = "Đã Nhập Điểm"
                                     AND hocviendangky.XetDuyet = "Chờ duyệt"
                                    AND chungchi.ID = ?',[$id]);
    	return view('ajax.banghocvien',compact('xetduyet'));
    }

    public function getBanghocvienchungchi(){
        $xetduyet = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, lopchungchi.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai,  hocviendangky.XetDuyet as XetDuyet
                                FROM hocviendangky, hocvien, lophoc, ketquathi,lopchungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lophoc.ID_HocVienDK
                                    AND lophoc.ID = ketquathi.ID_LopHoc
                                    AND hocviendangky.ID_Lop = lopchungchi.ID
                                    AND lophoc.TrangThai = "Đã Nhập Điểm"
                                    AND hocviendangky.XetDuyet = "Chờ duyệt"');
        return view('ajax.banghocvien',compact('xetduyet'));
    }

    public function getChitiethocvien(Request $req,$id){
        
            $chitiethocvien = DB::select('SELECT hocviendangky.ID as ID ,hocviendangky.SoHieu as SoHieu, hocviendangky.SoVaoSo as SoVaoSo, hocviendangky.NgayKy as NgayKy, hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, lopchungchi.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai,lophocphan.TenLop as TenLop
                                        FROM hocvien, hocviendangky,lopchungchi,lophoc,ketquathi,lophocphan
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                            AND lopchungchi.ID = hocviendangky.ID_Lop
                                            AND hocviendangky.ID = lophoc.ID_HocVienDK
                                            AND lophoc.ID = KetQuaThi.ID_LopHoc
                                            AND lophoc.ID_LopHP = lophocphan.ID
                                            AND hocviendangky.ID =?',[$id]);
            $chungchi = chungchi::all();
            $idhocvien = hocviendangky::where("ID",$id)->get();
            $html= view('ajax.modalchitiethocvien',compact('chitiethocvien','chungchi','idhocvien'))->render();            return response([
                'html'=>$html
            ]);        
        
        
    }

    public function getBangxetduyethocvien($id){
        $xetduyet = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, lopchungchi.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai, hocviendangky.XetDuyet as XetDuyet
                                FROM hocviendangky, hocvien, lophoc, ketquathi,lopchungchi,chungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lophoc.ID_HocVienDK
                                    AND lophoc.ID = ketquathi.ID_LopHoc
                                    AND hocviendangky.ID_Lop = lopchungchi.ID
                                    AND chungchi.ID = lopchungchi.ID_ChungChi
                                    AND hocviendangky.XetDuyet = "Chờ duyệt"
                                    AND chungchi.ID = ?',[$id]);
        return view('ajax.bangxetduyethocvien',compact('xetduyet'));
    }

    public function getBangxetduyethocvienchungchi(){
        $xetduyet = DB::select('SELECT DISTINCT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, lopchungchi.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai, hocviendangky.XetDuyet as XetDuyet
                                FROM hocviendangky, hocvien, lophoc, ketquathi,lopchungchi, chungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lophoc.ID_HocVienDK
                                    AND lophoc.ID = ketquathi.ID_LopHoc
                                    AND hocviendangky.ID_Lop = lopchungchi.ID');
        return view('ajax.bangxetduyethocvien',compact('xetduyet'));
    }

     public function getXetduyethocvien(Request $req,$id){
        if ($req->ajax()) {
            $chitiethocvien = DB::select('SELECT hocviendangky.ID as ID ,hocviendangky.SoHieu as SoHieu, hocviendangky.SoVaoSo as SoVaoSo, hocviendangky.NgayKy as NgayKy, hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, lopchungchi.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai,lophocphan.TenLop as TenLop
                                        FROM hocvien, hocviendangky,lopchungchi,lophoc,ketquathi,lophocphan
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                            AND lopchungchi.ID = hocviendangky.ID_Lop
                                            AND hocviendangky.ID = lophoc.ID_HocVienDK
                                            AND lophoc.ID = KetQuaThi.ID_LopHoc
                                            AND lophoc.ID_LopHP = lophocphan.ID
                                            AND hocviendangky.ID =?',[$id]);
            $kiemtraduyet = hocviendangky::where("ID",$id)->get();
            $hocvien = DB::select('SELECT hocviendangky.ID as ID
                                        FROM hocvien, hocviendangky,lopchungchi,lophoc,ketquathi,lophocphan
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                            AND lopchungchi.ID = hocviendangky.ID_Lop
                                            AND hocviendangky.ID = lophoc.ID_HocVienDK
                                            AND lophoc.ID = KetQuaThi.ID_LopHoc
                                            AND lophoc.ID_LopHP = lophocphan.ID
                                            AND hocviendangky.ID =?',[$id]);
            $html= view('ajax.modalxetduyethocvien',compact('chitiethocvien','kiemtraduyet','hocvien'))->render();
            // dd($html);
            return response([
                'html'=>$html
            ]);        
        }
        
    }

    public function getChitietdotthi(Request $req,$id){
        if ($req->ajax()) {
            $dotthi = dotthi::where("ID",$id)->get();
            $html= view('ajax.modaldotthi',compact('dotthi'))->render();
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

     public function getChitietbuoihoc(Request $req ,$id){
        $buoihoc = buoihoc::where("ID_Lop",$id)->get();
        return view('tuyensinh.molopchungchi',compact('buoihoc'));
    }

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
        $xetduyet = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, lopchungchi.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai, hocviendangky.XetDuyet as XetDuyet, hocviendangky.NgayKy as NgayKy, hocviendangky.SoHieu as SoHieu, hocviendangky.SoVaoSo as SoVaoSo
                                FROM hocviendangky, hocvien, lophoc, ketquathi,lopchungchi,chungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lophoc.ID_HocVienDK
                                    AND lophoc.ID = ketquathi.ID_LopHoc
                                    AND hocviendangky.ID_Lop = lopchungchi.ID
                                    AND chungchi.ID = lopchungchi.ID_ChungChi
                                    AND hocviendangky.XetDuyet = "Đã duyệt"
                                    AND chungchi.ID = ?',[$id]);
        return view('ajax.bangcapphatvanbang',compact('xetduyet'));
    }
   
    public function getCapphatvanbang(Request $req,$id){
       if ($req->ajax()) {
            $chitiethocvien = DB::select('SELECT hocviendangky.ID as ID ,hocviendangky.SoHieu as SoHieu, hocviendangky.SoVaoSo as SoVaoSo, hocviendangky.NgayKy as NgayKy, hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, lopchungchi.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai,lophocphan.TenLop as TenLop
                                        FROM hocvien, hocviendangky,lopchungchi,lophoc,ketquathi,lophocphan
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                            AND lopchungchi.ID = hocviendangky.ID_Lop
                                            AND hocviendangky.ID = lophoc.ID_HocVienDK
                                            AND lophoc.ID = KetQuaThi.ID_LopHoc
                                            AND lophoc.ID_LopHP = lophocphan.ID
                                            AND hocviendangky.ID =?',[$id]);
            $kiemtraduyet = hocviendangky::where("ID",$id)->get();
            $hocvien = DB::select('SELECT hocviendangky.ID as ID
                                        FROM hocvien, hocviendangky,lopchungchi,lophoc,ketquathi,lophocphan
                                        WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                            AND lopchungchi.ID = hocviendangky.ID_Lop
                                            AND hocviendangky.ID = lophoc.ID_HocVienDK
                                            AND lophoc.ID = KetQuaThi.ID_LopHoc
                                            AND lophoc.ID_LopHP = lophocphan.ID
                                            AND hocviendangky.ID =?',[$id]);
            $html= view('ajax.modalcapphatvanbang',compact('chitiethocvien','kiemtraduyet','hocvien'))->render();
            return response([
                'html'=>$html
            ]);        
        }
        
    }
    public function getLophocphan($id){

        $lophocphan = DB::select('SELECT HoTenHV,GioiTinh,NgaySinh,NoiSinh,SDT,TenLop
                                    FROM hocvien,hocviendangky,lophoc,lophocphan
                                    WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                        AND hocviendangky.ID = lophoc.ID_HocVienDK
                                        AND lophoc.ID_LopHP = lophocphan.ID
                                        AND lophocphan.ID =?
                                    ORDER BY HoTenHV',[$id]);
        return view('ajax.banglophocphan',compact('lophocphan'));
    }
    public function getLophoc($id){

        // $lophoc = DB::select('SELECT lophoc.ID as ID ,HoTenHV,GioiTinh,NgaySinh,NoiSinh,SDT,lopchungchi.TenLop as TenLop, hocviendangky.TrangThai as TrangThai
        //                             FROM hocvien,hocviendangky,lophoc,lopchungchi
        //                             WHERE   hocvien.ID = hocviendangky.ID_HocVien
        //                                 AND hocviendangky.ID = lophoc.ID_HocVienDK
        //                                 AND hocviendangky.ID_Lop = lopchungchi.ID
                                        
        //                                 AND lopchungchi.ID =?',[$id]);
         $lophoc = DB::table('hocviendangky')->join('hocvien','hocvien.ID','ID_HocVien')
                                                ->join('lopchungchi','lopchungchi.ID','ID_Lop')
                                                ->select('hocviendangky.ID as ID','HoTenHV','GioiTinh','NgaySinh','NoiSinh','SDT','hocviendangky.TrangThai as TrangThai','TenLop')
                                                ->where('hocviendangky.TrangThai','Chưa Đóng Học Phí')->where('lopchungchi.ID',$id)->orderBy('HoTenHV')
                                                ->get();
        return view('ajax.banglophoc',compact('lophoc'));
    }
    public function banghocvienlophocphan($id){
        $loailophoc = DB::select('SELECT  DISTINCT TenDanhMuc
                                    FROM danhmuc,chungchi,lopchungchi,lophocphan
                                    WHERE   danhmuc.ID = chungchi.ID_DanhMuc
                                        AND chungchi.ID = lopchungchi.ID_ChungChi
                                        AND lopchungchi.ID = lophocphan.ID_LopChungChi
                                        AND lophocphan.ID = ?',[$id]);
        $hocvien = DB::select('SELECT HoTenHV,GioiTinh,NgaySinh,NoiSinh,lophoc.ID as ID,DiemNghe,DiemNoi,DiemDoc,DiemViet,DiemLyThuyet,DiemThucHanh,KetQua,GhiChu
                                FROM hocvien,hocviendangky,lophoc,lophocphan,ketquathi
                                WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = lophoc.ID_HocVienDK
                                    AND lophoc.ID_LopHP = lophocphan.ID
                                    AND lophoc.ID = ketquathi.ID_LopHoc
                                    AND lophocphan.ID = ?',[$id]);
        $lophocphan = lophocphan::all();
        return view('ajax.banghocvienlophocphan',compact('hocvien','loailophoc','lophocphan'));
    }
     public function bangchuanhapdiem($id){
        $loailophoc = DB::select('SELECT  DISTINCT TenDanhMuc
                                    FROM danhmuc,chungchi,lopchungchi,lophocphan
                                    WHERE   danhmuc.ID = chungchi.ID_DanhMuc
                                        AND chungchi.ID = lopchungchi.ID_ChungChi
                                        AND lopchungchi.ID = lophocphan.ID_LopChungChi
                                        AND lophocphan.ID = ?',[$id]);
        $hocvien = DB::select('SELECT HoTenHV,GioiTinh,NgaySinh,NoiSinh,lophoc.ID as ID
                                FROM hocvien,hocviendangky,lophoc,lophocphan
                                WHERE   hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = lophoc.ID_HocVienDK
                                    AND lophoc.ID_LopHP = lophocphan.ID
                                    AND lophoc.TrangThai = "Chưa Nhập Điểm"
                                    AND lophocphan.ID = ?',[$id]);
        $lophocphan = lophocphan::all();
        return view('ajax.bangchuanhapdiem',compact('hocvien','loailophoc','lophocphan'));
    }
}
