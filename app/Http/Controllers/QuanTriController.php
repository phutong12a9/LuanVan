<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\giangvien;
use App\phonghoc;
use App\danhmucchungchi;
use App\chungchi;
use App\chucvu;
use App\canbo;
use App\User;
use DB;
class QuanTriController extends Controller
{
    public function getTaogiangvien(){
        $giangvien = giangvien::all();
        return view('quantri.giangvien',compact('giangvien'));
    }
    public function postTaogiangvien(Request $req){
        $giangvien = new giangvien;
        $giangvien->HoTenGV = $req->tengiangvien;
        $giangvien->HocVi = $req->hocvi;
        $giangvien->GioiTinh = $req->gioitinh;
        $giangvien->NgaySinh = Carbon::createFromFormat('d/m/Y', $req->ngaysinh)->format('Y-m-d');
        $giangvien->DiaChi = $req->diachi;
        $giangvien->SDT = $req->sdt;
        $giangvien->Email = $req->email;
        $giangvien->save();
        return redirect()->back()->with('themthanhcong','Đã thêm thành công giảng viên');
    }
    public function getDanhMuc(){
        $danhmuc = danhmucchungchi::all();
        return view('quantri.danhmuc',compact('danhmuc'));
    }
    public function postDanhMuc(Request $req){
       $danhmuc = new danhmucchungchi;
       $danhmuc->TenDanhMuc = $req->tendanhmuc;
       $danhmuc->save();
        return redirect()->back();
    }
    public function getChungchi(){
        $chungchi = chungchi::all();
        $danhmuc = danhmucchungchi::all();
        return view('quantri.chungchi',compact('chungchi','danhmuc'));
    }
    public function postChungchi(Request $req){
       $chungchi = new chungchi;
       $chungchi->ID_DanhMuc =$req->danhmuc;
       $chungchi->TenChungChi = $req->tenchungchi;
       $chungchi->save();
        return redirect()->back();
    }
    public function getPhong(){
        $phong = phonghoc::select('*')->orderBy('TenPhong')->get();
        return view('quantri.phong',compact('phong'));
    }
    public function postPhong(Request $req){
        $TenPhong = $req->day.".".$req->lau.".".$req->phong;
       $phong = new phonghoc;
       $phong->Day =$req->day;
       $phong->Lau =$req->lau;
       $phong->Phong =$req->phong;
       if(phonghoc::where('TenPhong',$TenPhong)->exists()){
        return redirect()->back()->with('loi','Phòng đã tồn tại trên hệ thống');
       }
       else{
         $phong->TenPhong = $req->day.".".$req->lau.".".$req->phong;
        $phong->save();
       }
      
        return redirect()->back();
    }
    public function getNguoidung(){
        $nguoidung = DB::table('canbo')->join('users','users.ID','canbo.ID_User')
                                    ->join('chucvu','chucvu.ID','canbo.ID_CV')
                                    ->get();
        $chucvu = chucvu::all();
        return view('quantri.nguoidung',compact('nguoidung','chucvu'));
    }
    public function postNguoidung(Request $req){
        $chucvu = chucvu::find($req->chucvu);
         $this -> validate($req,
            [
                'taikhoan'       => 'required|min:6|max:18|unique:users,TaiKhoan',// bắt buộc, không trùng
                'hoten'          => 'required',                                  // bắt buộc
                'ngaysinh'       => 'required|date_format:"d/m/Y"',              // bắt buộc, định dạng ngày
                'gioitinh'       => 'required',                                  // bắt buộc                                
                'email'          => 'email|unique:canbo,email',                // dạng email, không trùng
                'sdt'            => 'required',                                  // bắt buộc 
                'diachi'         => 'required',                                  // bắt buộc 
                'matkhau'        => 'required|min:6|max:18',                     // bắt buộc, tối thiểu 6 ký tự, tối đa 18 ký tự
                'nhaplaimatkhau' => 'required|same:matkhau'                      // bắt buộc 
            ],
            [
                'taikhoan.required'         =>'Tên Tài Khoản Không Được Bỏ Trống.',
                'taikhoan.min'              =>'Tên Tài Khoản Quá Ngắn.',
                'taikhoan.max'              =>'Tên Tài Khoản Vượt Quá Ký Tự Cho Phép.',
                'taikhoan.unique'           =>'Tên Tài Khoản Đã Tồn Tại.',
                'hoten.required'            =>'Họ Tên Không Được Bỏ Trống.',
                'ngaysinh.required'         =>'Ngày Sinh Không Được Bỏ Trống',
                'ngaysinh.date_format'      =>'Ngày Sinh Không Đúng Định Dạng',
                'gioitinh.required'         =>'Giới Tính Không Được Bỏ Trống',
                'email.email'               =>'Email Không Đúng Định Dạng.',
                'email.unique'              =>'Email đã tồn tại.',
                'noisinh.required'          =>'Nơi Sinh Không Được Bỏ Trống',
                'matkhau.required'          =>'Mật Khẩu Không Được Bỏ Trống',
                'matkhau.min'               =>'Mật Khẩu Quá Ngắn.',
                'matkhau.max'               =>'Mật Khẩu Vượt Quá Ký Tự Cho Phép.',
                'nhaplaimatkhau.required'   =>'Nhập Lại Mật Khẩu Không Được Bỏ Trống.',
                'nhaplaimatkhau.same'       =>'Mật Khẩu Không Trùng Nhau.'
            ]);
        $user = new User;
        $user->ID = $req->id;
        $user->TaiKhoan = $req->taikhoan;
        $user->password = bcrypt($req->matkhau);
        if ($chucvu->TenCV == "Cán Bộ") {
            $user->PhanQuyen = 2;
        }
        elseif($chucvu->TenCV == "Giảng Viên"){
            $user->PhanQuyen = 3;
        }
        $user->save();
        
        $canbo = new canbo;
        $canbo->ID_User = $user->id;
        $canbo->ID_CV = $req->chucvu;
        $canbo->HoTenCB = $req->hoten;
        $canbo->GioiTinh = $req->gioitinh;
        $canbo->NgaySinh = Carbon::createFromFormat('d/m/Y', $req->ngaysinh)->format('Y-m-d');
        $canbo->DiaChi = $req->diachi;
        $canbo->SDT = $req->sdt;
        $canbo->Email = $req->email;
        $canbo->save();
        return redirect()->back()->with('themthanhcong','Đã thêm thành công một người dùng.');
    }
}
