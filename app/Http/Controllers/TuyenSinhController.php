<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\chungchi;
use App\dotthi;
use App\buoihoc;
use App\phonghoc;
use App\giangvien;
use App\lopchungchi;
use App\lophocphan;
use App\lophoc;
use App\thongbao;
use App\hocviendangky;
use DB;
use Excel;
class TuyenSinhController extends Controller
{
    public function getMolopchungchi(){
    	$lopchungchi = lopchungchi::all();
    	$chungchi = chungchi::all();
    	$lophocchungchi = DB::select('SELECT lopchungchi.ID as ID ,TenLop, HocPhi , NgayKhaiGiang , ThoiGianHoc , ThoiGianThi, BuoiHoc , lopchungchi.TrangThai as TrangThai
    								  FROM chungchi,lopchungchi 
    								  WHERE 	lopchungchi.ID_ChungChi = chungchi.ID ');
    	return view('tuyensinh.molopchungchi',compact('lopchungchi','chungchi','lophocchungchi'));
    }
    public function postMolopchungchi(Request $req){
    	$this->validate($req,
            [
                'tenchungchi'       => 'required',
                'tenlop'    		=> 'required',
                'ngaykhaigiang'     => 'required|date_format:"d/m/Y"',
                'buoihoc'           => 'required',
                'thoigianhoc'       => 'required',
                'thoigianthi'       => 'required',
                'hocphi'            => 'required'
            ],
            [   
                'tenchungchi.required'          => 'Vui lòng chọn chứng chỉ.',
                'tenlop.required'       		=> 'Vui lòng nhập tên lớp.',
                'ngaykhaigiang.required'        => 'Vui lòng nhập ngày khai giảng.',
                'ngaykhaigiang.date_format'     => 'Ngày khai giảng không đúng định dạng',
                'buoihoc.required'              => 'Vui lòng chọn buổi học',
                'thoigianhoc.required'          => 'Vui lòng nhập thời gian học.',
                'thoigianthi.required'          => 'Vui lòng nhập thời gian thi',
                'hocphi.required'               => 'Vui lòng nhập học phí.'
            ]);

        $lopchungchi = new lopchungchi;
        $lopchungchi->ID_ChungChi = $req->tenchungchi;
        $lopchungchi->TenLop = $req->tenlop;
        $lopchungchi->NgayKhaiGiang = Carbon::createFromFormat('d/m/Y', $req->ngaykhaigiang)->format('Y-m-d');
        $lopchungchi->BuoiHoc = $req->buoihoc;
        $lopchungchi->ThoiGianHoc = $req->thoigianhoc;
        $lopchungchi->ThoiGianThi = Carbon::createFromFormat('d/m/Y', $req->thoigianthi)->format('Y-m-d');
        $lopchungchi->HocPhi = $req->hocphi;
        $lopchungchi->TrangThai = "Đang Mở";
        $lopchungchi->save();
        return redirect()->back()->with('themthanhcong','Đã thêm mới thành công.');
    }

    public function getLopchungchi(){
        $lopchungchi = lopchungchi::all();
        $giangvien = giangvien::all();
        $lophocphan = lophocphan::all();
        return view('tuyensinh.lopchungchi',compact('lopchungchi','giangvien','lophocphan'));
    }
    public function postLophocphan(Request $req){
        $this->validate($req,
            [
                'tenlophocphan' =>'required|min:6|max:50|unique:lophocphan,TenLop'
            ],
            [
                'tenlophocphan.required'    =>'Vui lòng nhập tên lớp học phần',
                'tenlophocphan.min'         =>'Tên lớp học phần quá ngắn',
                'tenlophocphan.max'         =>'Tên lớp học phần quá dài',
                'tenlophocphan.unique'      =>'Tên lớp học phần đã tồn tại',
            ]

        );
            $lophocphan                 = new lophocphan;
            $lophocphan->ID_LopChungChi = $req->lophoc;
            $lophocphan->ID_GiangVien   = $req->giangvien;
            $lophocphan->TenLop         = $req->tenlophocphan;
            $lophocphan->PhongHoc       = $req->phonghoc;
            $lophocphan->save();
        return redirect()->back()->with('themthanhcong','Đã thêm mới thành công.');
    }

    public function postThemhocvienlophocphan(Request $req){
         $length = count($req->hocvien);
        for($i=0; $i<$length; $i++){
            $lophoc                 = new lophoc;
            $lophoc->ID_HocVienDK   = $req->hocvien[$i];
            $lophoc->ID_LopHP       = $req->tenlophp;
            $lophoc->save();
            $hocvien                = new hocviendangky;
            $arr['TrangThai']       = 'Đã Đóng Học Phí';
            $hocvien::where('ID',$req->hocvien[$i])->update($arr);
            
        }
        return redirect()->back()->with('themthanhcong','Đã thêm thành công.');
    }
}
