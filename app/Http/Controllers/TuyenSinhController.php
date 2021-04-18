<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\chungchi;
use App\dotthi;
use App\buoihoc;
use App\phonghoc;
use App\giangvien;
use App\khoahoc;
use App\lophoc;
use App\lop;
use App\thongbao;
use App\khoa;
use App\hocviendangky;
use DB;
use Excel;
class TuyenSinhController extends Controller
{
    public function getKhoahoc(){
    	$khoahoc = DB::table('khoahoc')->join('khoa','khoa.ID','khoahoc.ID_Khoa')
                                        ->select('khoahoc.*','Ten')
                                        ->orderBy('Ten','DESC')
                                        ->orderBy('TenKhoa','ASC')
                                        ->get();
    	$chungchi = chungchi::all();
        $khoa = khoa::select('*')->orderBy('ID','DESC')->get();
    	return view('tuyensinh.khoahoc',compact('khoahoc','chungchi','khoa'));
    }
    public function postKhoahoc(Request $req){

            $this->validate($req,
            [
                'tenchungchi'       => 'required',
                'ngaykhaigiang'     => 'required|date_format:"d/m/Y"',
                'thoigianthi'       => 'required',
                'hocphi'            => 'required'
            ],
            [   
                'tenchungchi.required'          => 'Vui lòng chọn chứng chỉ.',
                'ngaykhaigiang.required'        => 'Vui lòng nhập ngày khai giảng.',
                'ngaykhaigiang.date_format'     => 'Ngày khai giảng không đúng định dạng',
                'thoigianthi.required'          => 'Vui lòng nhập thời gian thi',
                'hocphi.required'               => 'Vui lòng nhập học phí.'
            ]);

        $tenchungchi = chungchi::select('TenChungChi')->where('ID',$req->tenchungchi)->first();
        $tenkhoa = khoa::select('Ten')->where('ID',$req->khoa)->first();

        $Tenkhoahoc = $tenchungchi->TenChungChi ." ".$req->capdo;
        if(khoahoc::where('TenKhoa',$Tenkhoahoc)->exists()){
           return redirect()->back()->with('error','Tên khóa học đã tồn tại');  
        }
        else{

            $khoahoc = new khoahoc;
            $khoahoc->ID_ChungChi = $req->tenchungchi;
            $khoahoc->ID_Khoa = $req->khoa;
            $khoahoc->TenKhoa = $Tenkhoahoc;
            $khoahoc->NgayKhaiGiang = Carbon::createFromFormat('d/m/Y', $req->ngaykhaigiang)->format('Y-m-d');
            $khoahoc->ThoiGianThi = Carbon::createFromFormat('d/m/Y', $req->thoigianthi)->format('Y-m-d');
            $khoahoc->HocPhi = $req->hocphi;
            $khoahoc->TrangThai = "Đang Mở";
            $khoahoc->save();
            return redirect()->back()->with('themthanhcong','Đã thêm mới thành công.');
        }
            
    }

    public function getLophoc(){
        $khoa = khoa::select('*')->orderBy('Ten','DESC')->get();
        $khoahoc = khoahoc::all();
        $giangvien = giangvien::all();
        $kh = khoahoc::all();
        return view('tuyensinh.lophoc',compact('khoa','khoahoc','giangvien','kh'));
    }
    public function postLophoc(Request $req){

            
            $lophoc                 = new lophoc;
            $lophoc->ID_KhoaHoc     = $req->tenkhoahoc;
            $lophoc->TenLop         = $req->tenlop;
            $lophoc->NgayHoc        = $req->ngayhoc;
            $lophoc->BuoiHoc        = $req->buoihoc;
            $lophoc->ThoiGianHoc    = $req->thoigianhoc;
            $lophoc->save();
        return redirect()->back()->with('themthanhcong','Đã thêm mới thành công.');
    }

    public function postThemhocvienlophoc(Request $req){
         $length = count($req->hocvien);
        for($i=0; $i<$length; $i++){
            $lop                 = new lop;
            $lop->ID_HocVienDK   = $req->hocvien[$i];
            $lop->ID_LopHP       = $req->tenlophp;
            $lop->save();
            $hocvien                = new hocviendangky;
            $arr['TrangThai']       = 'Đã Đóng Học Phí';
            $hocvien::where('ID',$req->hocvien[$i])->update($arr);
            
        }
        return redirect()->back()->with('themthanhcong','Đã thêm thành công.');
    }
}
