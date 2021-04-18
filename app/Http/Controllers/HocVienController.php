<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Hash;
use App\User;
use App\hocvien;
use App\lophoc;
use App\lop;
use App\ketquathi;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NhapDiemImport;

class HocVienController extends Controller
{
     public function getDangkyhocvien(){
        $id = DB::select('SELECT max(`ID`) as maxID FROM `users`');
    	return view('hocvien.dangkyhocvien',compact('id'));
    }
    public function postDangkyhocvien(Request $req){
         $this -> validate($req,
            [
                'taikhoan'       => 'required|min:6|max:18|unique:users,TaiKhoan',// bắt buộc, không trùng
                'hoten'          => 'required',                                  // bắt buộc
                'ngaysinh'       => 'required|date_format:"d/m/Y"',              // bắt buộc, định dạng ngày
                'gioitinh'       => 'required',                                  // bắt buộc                                  
                'email'          => 'email|unique:hocvien,email',                // dạng email, không trùng
                'noisinh'        => 'required',                                  // bắt buộc 
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
    	$user->PhanQuyen = 0;
    	$user->save();
        
    	$hocvien = new hocvien;
    	$hocvien->ID_User = $user->ID;
    	$hocvien->HoTenHV = $req->hoten;
    	$hocvien->GioiTinh = $req->gioitinh;
    	$hocvien->NgaySinh = Carbon::createFromFormat('d/m/Y', $req->ngaysinh)->format('Y-m-d');
    	$hocvien->NoiSinh = $req->noisinh;
    	$hocvien->SDT = $req->sdt;
    	$hocvien->Email = $req->email;
    	$hocvien->save();
    	return redirect()->back()->with('themthanhcong','Đã tạo thành công một tài khoản.');
    }
    public function getThoikhoabieu(){
        if (Session::has('users')) {
            $iduser = Session('users')->ID;
            $tkb = DB::select(' SELECT lopchungchi.TenLop, lophocphan.PhongHoc, lopchungchi.ThoiGianHoc, lopchungchi.NgayKhaiGiang,giangvien.HoTenGV,lopchungchi.BuoiHoc
                            FROM users,hocvien,hocviendangky,lopchungchi,lophoc,lophocphan,giangvien
                            WHERE   users.ID = hocvien.ID_User
                                AND hocvien.ID =hocviendangky.ID_HocVien
                                AND hocviendangky.ID_Lop = lopchungchi.ID
                                AND hocviendangky.ID = lophoc.ID_HocVienDK
                                AND lophoc.ID_LopHP = lophocphan.ID
                                AND lophocphan.ID_GiangVien = giangvien.ID
                                AND users.ID =?',[$iduser]);
        }
        if ($tkb == null) {
            return redirect()->back()->with('loi',"Bạn chưa thuộc khóa học nào");
        }
        else{
           $ngaykhaigiang = $tkb[0]->NgayKhaiGiang;
        $buoihoc =$tkb[0]->BuoiHoc;
        $day = Carbon::createFromFormat('Y-m-d',$ngaykhaigiang);
        $d = strtotime(Carbon::createFromFormat('Y-m-d',$ngaykhaigiang));
        $m = $day->addMonths(2);
        // $date = strtotime(Carbon::createFromFormat('d','11')) - strtotime(Carbon::createFromFormat('d','9'));
        // dd($date);
        $motngay = 86400; // 1 ngày
        $haingay = 172800; //2 ngày
        $mottuan = 604800; // 1 Tuần
        $months = strtotime($m);
        $arr = array();
        if ($buoihoc=="Thứ 2 - 4 - 6" || $buoihoc=="Thứ 3 - 5 - 7") {
           //cách 2 ngày
            while ( $d <= $months) {
            $day2 = $d + $haingay;
            $day4 = $day2 + $haingay;
            array_push($arr, Carbon::parse($d)->format('Y-m-d'),Carbon::parse($day2)->format('Y-m-d'),Carbon::parse($day4)->format('Y-m-d'));
            $d = $d+$mottuan;
            }
        }
        if ($buoihoc=="Thứ 2 - 3 - 4" || $buoihoc=="Thứ 3 - 4 - 5" || $buoihoc=="Thứ 4 - 5 - 6" || $buoihoc=="Thứ 5 - 6 - 7" || $buoihoc=="Thứ 6 - 7 - CN") {
           // Cách 1 Ngày
            while ( $d <= $months) {
            $day1 = $d + $motngay;
            $day2 = $day1 + $motngay;
            array_push($arr,date('Y-m-d',$d),date('Y-m-d',$day1),date('Y-m-d',$day2));
            $d = $d+$mottuan;
            }
        }
        return view('hocvien.thoikhoabieu',compact('arr')); 
        }
        
    }
    public function getNhapdiem(){
        $lophoc = lophoc::all();
        return view('hocvien.nhapdiem',compact('lophoc'));
    }
    public function NhapDiemImport(Request $req){

         if ($req->hasFile('file')) {

          // validate incoming request
          $this->validate($req, [
            'file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
          ]);

              if ($req->file('file')->isValid()) {
                Excel::import(new NhapDiemImport,request()->file('file')); 
                  
              }
          }
         return redirect()->back()->with('themthanhcong','Đã thêm mới thành công.');
    
    }
    public function postNhapDiem(Request $req){
        $TBAV = ($req->diemnghe + $req->diemnoi + $req->diemdoc + $req->diemviet)/4;
        $TBTH = ($req->diemlythuyet+ $req->diemthuchanh);
        $ketquathi = new ketquathi;
        $ketquathi->ID_Lop          = $req->sbd;
        $ketquathi->DiemNghe        = $req->diemnghe;
        $ketquathi->DiemNoi         = $req->diemnoi;
        $ketquathi->DiemDoc         = $req->diemdoc;
        $ketquathi->DiemViet        = $req->diemviet;
        $ketquathi->DiemLyThuyet    = $req->diemlythuyet;
        $ketquathi->DiemThucHanh    = $req->diemthuchanh;
        if ($TBAV>=5 || $TBTH >=5) {
           $ketquathi->KetQua = "Đạt";
        }else{
            $ketquathi->KetQua = "Không Đạt";
        }
        $ketquathi->GhiChu          = $req->ghichu;
        if(($TBAV < 5 && $TBAV > 0)|| ($TBTH < 5 && $TBTH > 0)){
            $ketquathi->XepLoai = "Yếu";
        }else if($TBAV <= 6.5 || $TBTH <= 6.5){
            $ketquathi->XepLoai = "Trung Bình";
        }else if($TBAV <= 8 || $TBTH <= 8){
            $ketquathi->XepLoai = "Khá";
        }else if($TBAV <= 9.5  || $TBTH <= 9.5){
            $ketquathi->XepLoai = "Giỏi";
        }else if($TBAV <= 10 || $TBTH <= 10){
            $ketquathi->XepLoai = "Xuất Sắc";
        }
        $ketquathi->ThoiGian = date('Y-m-d');
        $ketquathi->save();

        $TrangThai = new lop;
        $arr['TrangThai']       = 'Đã Nhập Điểm';
        $TrangThai::where('ID',$req->sbd)->update($arr);

        return redirect()->back()->with('themthanhcong','Đã thêm mới thành công.');

    }

    public function getTaogiangvien(){
        $giangvien = DB::table('giangvien')->join('hocvi','hocvi.ID','giangvien.ID_HocVi')->select('giangvien.*','TenHocVi')->get();
        return view('vanbang.giangvien',compact('giangvien'));
    }
    public function postTaogiangvien(){
        
    }
}
