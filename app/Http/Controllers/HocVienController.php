<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Hash;
use App\User;
use App\hocvien;
use App\lophocchinhthuc;
use App\hocviendangky;
use App\lophoc;
use App\lop;
use App\ketquathi;
use App\danhsachthi;
use App\giangvien;
use App\chungchi;
use App\khoa;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NhapDiemImport;
use App\Exports\NhapDiemExport;

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
     public function postThemhocvienlophoc(Request $req){
         $length = count($req->hocvien);
        for($i=0; $i<$length; $i++){
            $lop                 = new lophocchinhthuc;
            $lop->ID_HocVienDK   = $req->hocvien[$i];
            $lop->ID_LopHP       = $req->tenlophp;
            $lop->save();
            $hocvien                = new hocviendangky;
            $arr['TrangThai']       = 'Đã Đóng Học Phí';
            $hocvien::where('ID',$req->hocvien[$i])->update($arr);
            
        }
        return redirect()->back()->with('themthanhcong','Đã thêm thành công.');
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
        $chungchi = chungchi::all();
        return view('hocvien.nhapdiem',compact('chungchi'));
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
        $SBD = $req->sbd;
        $lopchungchi = DB::table('lopthi')
                                        ->join('danhsachthi','danhsachthi.ID_LopThi','lopthi.ID')
                                        ->join('chungchi','chungchi.ID','lopthi.ID_ChungChi')
                                        ->select('TenChungChi')
                                        ->where('danhsachthi.ID',$SBD)
                                        ->first();
        $tenchungchi = $lopchungchi->TenChungChi;
        $ketquathi = new ketquathi;
        if ($tenchungchi == "TOEIC") {
            $KetQua = $req->diemnghe + $req->diemdoc;
        }
        elseif($tenchungchi=="IELST"){
            $KetQua = $req->diemnghe + $req->diemnoi + $req->diemdoc + $req->diemviet;
        }
        elseif($tenchungchi=="Tin Học"){
            $DTB = ($req->diemlythuyet + $req->diemthuchanh)/2;
            if(($DTB < 5 && $DTB > 0)){
                $KetQua = "Không Đạt";
                $ketquathi->XepLoai = "Yếu";
            }else if( $DTB <= 6.5){
                $KetQua = "Đạt";
                $ketquathi->XepLoai = "Trung Bình";
            }else if( $DTB <= 8){
                $KetQua = "Đạt";
                $ketquathi->XepLoai = "Khá";
            }else if($DTB <= 9.5){
                $KetQua = "Đạt";
                $ketquathi->XepLoai = "Giỏi";
            }else if($DTB <= 10){
                $KetQua = "Đạt";
                $ketquathi->XepLoai = "Xuất Sắc";
            }
            else{
                return redirect()->back()->with('errors','Điểm bạn nhập đã xảy ra lỗi.');
            }
        }
        $ketquathi->ID_DanhSachThi  = $req->sbd;
        $ketquathi->DiemNghe        = $req->diemnghe;
        $ketquathi->DiemNoi         = $req->diemnoi;
        $ketquathi->DiemDoc         = $req->diemdoc;
        $ketquathi->DiemViet        = $req->diemviet;
        $ketquathi->DiemLyThuyet    = $req->diemlythuyet;
        $ketquathi->DiemThucHanh    = $req->diemthuchanh;
        $ketquathi->KetQua = $KetQua;
        $ketquathi->GhiChu          = $req->ghichu;
        $ketquathi->ThoiGian = date('Y-m-d');
        $ketquathi->save();

        $TrangThai = new danhsachthi;
        $arr['TrangThai']       = 'Đã Nhập Điểm';
        $TrangThai::where('ID',$req->sbd)->update($arr);

        return redirect()->back()->with('themthanhcong','Đã nhập điểm thành công.');

    }

    public function getHocvienlophoc(){
        $khoa = khoa::all();
        return view('hocvien.hocvienlophoc', compact('khoa'));
    }
    public function getDanhsachthi(){
        $khoa = khoa::all();
        return view('hocvien.danhsachthi', compact('khoa'));
    }
     public function getLophoc(){
        $khoa = khoa::all();
        return view('hocvien.lophoc', compact('khoa'));
    }
    public function postThemhocvienlopthi(Request $req){
        $length = count($req->hocvien);
        $id = $req ->tenkhoa;
        $tenchungchi = DB::table('khoahoc')->join('chungchi','khoahoc.ID_ChungChi','chungchi.ID')
                                            ->join('khoa','khoa.ID','khoahoc.ID_Khoa')
                                            ->select('TenChungChi','Ten')
                                            ->where('khoahoc.ID',$id)
                                            ->first();
        $tenkhoa = $tenchungchi->Ten;
        $TenChungChi = $tenchungchi->TenChungChi;
        $K = str_replace("Khóa ", "",$tenkhoa ); 
        if($K<10){
            $Khoa = "0".$K;
        }
        elseif ($K>=10) {
            $Khoa = $K;
        } 
        if ($TenChungChi == "TOEIC") {
            $ChungChi = "TE";
           }   
        elseif ($TenChungChi == "IELST") {
            $ChungChi = "IE";
        }
        elseif ($TenChungChi == "Tin Học") {
            $ChungChi = "TH";
        }

        for ($i=0; $i <$length ; $i++) { 
            $hocvien = new danhsachthi;
            for ($j=1; $j <1000 ; $j++) { 
                if ($j<10) {
                    $STT = "00".$j;
                }
                elseif ($j<100) {
                    $STT = "0".$j;
                }
                elseif($j<1000){
                    $STT = $j;
                }

                $SBD = $ChungChi.$Khoa.$STT;
                if(danhsachthi::where('ID',$SBD)->exists()){
                }
                else{
                    $hocvien->ID = $SBD;
                    $hocvien->ID_LopThi = $req->tenlopthi;
                    $hocvien->ID_HocVienDK = $req->hocvien[$i];
                    $hocvien->TrangThai = "Chưa Nhập Điểm";
                    $hocvien->save();
                    break;
                }
               
            }
        }

        return redirect()->back()->with('themthanhcong', 'Thêm thành công');
    }
    public function NhapDiemExport(Request $req){
        $type = $req->type;
        return Excel::download(new NhapDiemExport, 'users.xlsx');
    }
}
