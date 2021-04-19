<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'trangchu'], function(){
	//Gọi Route trangchu   domain/trangchu/ 
	Route::get('/',[
		'as'=>'trang-chu',
		'uses'=>'TrangChuController@getTrangchu'
	]);
	//Gọi Route tracuuketquathi   domain/trangchu/tracuuketquathi
	Route::get('tracuuketquathi',[
		'as'=>'tra-cuu-ket-qua-thi',
		'uses'=>'TrangChuController@getTracuuketquathi'
	]);
	//Gọi Route lienhe   domain/trangchu/lienhe
	Route::get('lienhe',[
		'as'=>'lien-he',
		'uses'=>'TrangChuController@getLienhe'
	]);

	Route::get('chitietthongbao/{id}',[
		'as'=>'chi-tiet-thong-bao',
		'uses'=>'TrangChuController@getChitietthongbao'
	]);

	Route::get('chuyenmucthongbao/{id}',[
		'as'=>'chuyen-muc-thong-bao',
		'uses'=>'TrangChuController@getChuyenmucthongbao'
	]);
	Route::get('dangkylophoc',[
		'as'=>'dang-ky-lop-hoc',
		'uses'=>'TrangChuController@getDangkylophoc'
	]);
	Route::post('dangkylophoc',[
		'as'=>'dang-ky-lop-hoc-post',
		'uses'=>'TrangChuController@postDangkylophoc'
	]);
	Route::get('huydangkychungchi/{id}',[
		'as'=>'huy-dang-ky-chung-chi',
		'uses'=>'TrangChuController@getHuydangkychungchi'
	]);
	Route::get('dangkylop/{id}',[
		'as'=>'dang-ky-lop',
		'uses'=>'TrangChuController@getDangkylop'
	]);
});
Route::group([ 'prefix' => 'vanbang' ] , function(){   
//Gọi Route tracuuvanbang:   domain/vanbang/tracuuvanbang 
	Route::get('tracuuvanbang',[
		'as'=>'tra-cuu-van-bang',
		'uses'=>'VanBangController@getTracuuvanbang'
	]);
	//Gọi Route dotcapvanbang:   domain/vanbang/dotcapvanbang 
	Route::get('dotcapvanbang',[
		'as'=>'dot-cap-van-bang',
		'uses'=>'VanBangController@getDotcapvanbang'
	]);
	Route::post('themdotcap',[
		'as'=>'them-dot-cap',
		'uses'=>'VanBangController@postThemdotcap'
	]);
	Route::post('capnhatdotcap',[
		'as'=>'cap-nhat-dot-cap',
		'uses'=>'VanBangController@postCapnhatdotcap'
	]);
	Route::post('xoadotcap',[
		'as'=>'xoa-dot-cap',
		'uses'=>'VanBangController@postXoadotcap'
	]);
	//Gọi Route themvanbang:   domain/vanbang/themvanbang 
	Route::get('themvanbang',[
		'as'=>'them-van-bang',
		'uses'=>'VanBangController@getThemvanbang'
	]);
	Route::post('themmoivanbang',[
		'as'=>'them-moi-van-bang',
		'uses'=>'VanBangController@postThemvanbang'
	]);
	Route::post('capnhatvanbang',[
		'as'=>'cap-nhat-van-bang',
		'uses'=>'VanBangController@postCapnhatvanbang'
	]);
	Route::post('xoavanbang',[
		'as'=>'xoa-van-bang',
		'uses'=>'VanBangController@postXoavanbang'
	]);
	//Gọi Route duyetvanbang:   domain/vanbang/duyetvanbang 
	Route::get('duyetvanbang',[
		'as'=>'duyet-van-bang',
		'uses'=>'VanBangController@getDuyetvanbang'
	]);
	Route::post('duyethocvien',[
		'as'=>'duyet-hoc-vien',
		'uses'=>'VanBangController@postDuyethocvien'
	]);
	Route::post('khongduyethocvien',[
		'as'=>'khong-duyet-hoc-vien',
		'uses'=>'VanBangController@postKhongduyethocvien'
	]);
	Route::get('capphatvanbang',[
		'as'=>'cap-phat-van-bang',
		'uses'=>'VanBangController@getCapphatvanbang'
	]);
	Route::get('invanbang/{id}',[
		'as'=>'in-van-bang',
		'uses'=>'VanBangController@Invanbang'
	]);
	Route::post('importvanbang',[
		'as'=>'import-van-bang',
		'uses'=>'VanBangController@postImport'
	]);
	Route::post('exportvanbang',[
		'as'=>'export-van-bang',
		'uses'=>'VanBangController@Excelexport'
	]);
}); 
Route::group([ 'prefix' => 'thongbao' ] , function(){   
//Gọi Route dangthongbao:   domain/thongbao/dangthongbao 
	Route::get('dangthongbao',[
		'as'=>'dang-thong-bao',
		'uses'=>'ThongBaoController@getDangthongbao'
	]);
	Route::post('dangthongbaomoi',[
		'as'=>'dang-thong-bao-moi',
		'uses'=>'ThongBaoController@postDangthongbao'
	]);
	Route::get('xoathongbao/{id}',[
		'as'=>'xoa-thong-bao',
		'uses'=>'ThongBaoController@getXoathongbao'
	]);
	//Gọi Route danhsachthongbao:   domain/vanbang/danhsachthongbao 
	Route::get('danhsachthongbao',[
		'as'=>'danh-sach-thong-bao',
		'uses'=>'ThongBaoController@getDanhsachthongbao'
	]);
	//Gọi Route capnhatthongbao:   domain/thongbao/capnhatthongbao
	Route::get('capnhatthongbao/{id}',[
		'as'=>'cap-nhat-thong-bao',
		'uses'=>'ThongBaoController@getCapnhatthongbao'
	]);
	Route::post('capnhatthongbao',[
		'as'=>'cap-nhat-lai-thong-bao',
		'uses'=>'ThongBaoController@postCapnhatthongbao'
	]);
}); 
Route::group([ 'prefix' => 'hocvien' ] , function(){   
//Gọi Route dangthongbao:   domain/hocvien/dangkyhocvien 
	Route::get('dangkyhocvien',[
		'as'=>'dang-ky-hoc-vien',
		'uses'=>'HocvienController@getDangkyhocvien'
	]);
	Route::post('dangkyhocvien',[
		'as'=>'dang-ky-hoc-vien',
		'uses'=>'HocvienController@postDangkyhocvien'
	]);
	Route::get('thoikhoabieu',[
		'as'=>'thoi-khoa-bieu',
		'uses'=>'HocvienController@getThoikhoabieu'
	]);
	Route::get('nhapdiem',[
		'as'=>'nhap-diem',
		'uses'=>'HocvienController@getNhapdiem'
	]);
	Route::post('nhapdiemimport',[
		'as'=>'nhap-diem-import',
		'uses'=>'HocvienController@NhapDiemImport'
	]);
	Route::post('postnhapdiem',[
		'as'=>'post-nhap-diem',
		'uses'=>'HocvienController@postNhapDiem'
	]);
	Route::get('giangvien',[
		'as'=>'giang-vien',
		'uses'=>'HocvienController@getTaogiangvien'
	]);
	
}); 
Route::group([ 'prefix' => 'tuyensinh' ] , function(){   
//Gọi Route dangthongbao:   domain/tuyensinh/molopchungchi
	Route::get('khoahoc',[
		'as'=>'khoa-hoc',
		'uses'=>'TuyenSinhController@getKhoahoc'
	]);
	Route::post('mokhoa',[
		'as'=>'mo-khoa',
		'uses'=>'TuyenSinhController@postKhoahoc'
	]);
	Route::get('lophoc',[
		'as'=>'lop-hoc',
		'uses'=>'TuyenSinhController@getLophoc'
	]);
	Route::post('lophoc',[
		'as'=>'lop-hoc-post',
		'uses'=>'TuyenSinhController@postLophoc'
	]);
	Route::post('themhocvienlophoc',[
		'as'=>'them-hoc-vien-lop-hoc',
		'uses'=>'TuyenSinhController@postThemhocvienlophoc'
	]);
	
}); 
Route::group(['prefix'=>'ajax'], function(){
	//Gọi Route ajax  domain/ajax/ 
	Route::get('banghocvien/{id}',[
		'as'=>'bang-hoc-vien',
		'uses'=>'AjaxController@getBanghocvien'
	]);
	Route::get('banghocvien',[
		'as'=>'bang-hoc-vien-chung-chi',
		'uses'=>'AjaxController@getBanghocvienchungchi'
	]);
	Route::get('chitiethocvien/{id}',[
		'as'=>'chi-tiet-hoc-vien',
		'uses'=>'AjaxController@getChitiethocvien'
	]);
	Route::get('bangxetduyethocvien/{id}',[
		'as'=>'bang-xet-duyet-hoc-vien',
		'uses'=>'AjaxController@getBangxetduyethocvien'
	]);
	Route::get('bangxetduyethocvienchungchi',[
		'as'=>'bang-xet-duyet-hoc-vien-chung-chi',
		'uses'=>'AjaxController@getBangxetduyethocvienchungchi'
	]);
	Route::get('bangxetduyethocvien/{idvb}/{iddc}',[
		'as'=>'bang-xet-duyet-hoc-vien-dot-cap',
		'uses'=>'AjaxController@getBangxetduyethocviendotcap'
	]);
	Route::get('xetduyethocvien/{id}',[
		'as'=>'xet-duyet-hoc-vien',
		'uses'=>'AjaxController@getXetduyethocvien'
	]);
	Route::get('chitietdotthi/{id}',[
		'as'=>'chi-tiet-dot-thi',
		'uses'=>'AjaxController@getChitietdotthi'
	]);
	// Route::get('banglophoc/{id}',[
	// 	'as'=>'bang-lop-hoc',
	// 	'uses'=>'AjaxController@getBanglophoc'
	// ]);
	// Route::get('bangdotcaplophoc/{idcc}/{iddc}',[
	// 	'as'=>'bang-dot-cap-lop-hoc',
	// 	'uses'=>'AjaxController@getBangdotcaplophoc'
	// ]);
	// Route::get('buoihoc/{id}',[
	// 	'as'=>'buoi-hoc',
	// 	'uses'=>'AjaxController@getChitietbuoihoc'
	// ]);
	// Route::post('thembuoihoc',[
	// 	'as'=>'them-buoi-hoc',
	// 	'uses'=>'AjaxController@postThembuoihoc'
	// ]);
	Route::get('bangcapphatvanbang/{id}',[
		'as'=>'bang-cap-phat-van-bang',
		'uses'=>'AjaxController@getBangcapphatvanbang'
	]);
	Route::get('bangcapphatvanbang/{idvb}/{iddc}',[
		'as'=>'bang-cap-phat-van-bang-dot-cap',
		'uses'=>'AjaxController@getBangcapphatvanbangdotcap'
	]);
	Route::get('capphatvanbang/{id}',[
		'as'=>'cap-phat-van-bang-hoc-vien',
		'uses'=>'AjaxController@getCapphatvanbang'
	]);
	Route::get('lophoc/{id}',[
		'as'=>'ajax-lop-hoc',
		'uses'=>'AjaxController@getLophoc'
	]);
	Route::get('khoahoc/{id}',[
		'as'=>'ajax-khoa-hoc',
		'uses'=>'AjaxController@getKhoahoc'
	]);
	Route::get('hocvienlophoc/{id}',[
		'as'=>'hoc-vien-lop-hoc',
		'uses'=>'AjaxController@banghocvienlophoc'
	]);
	Route::get('hocvienchuanhapdiem/{id}',[
		'as'=>'hoc-vien-chua-nhap-diem',
		'uses'=>'AjaxController@bangchuanhapdiem'
	]);
	Route::get('tenlop/{id}',[
		'as'=>'ten-lop',
		'uses'=>'AjaxController@getTenlop'
	]);
	Route::get('tenkhoa/{id}',[
		'as'=>'ten-khoa',
		'uses'=>'AjaxController@getTenkhoa'
	]);
	Route::get('tenkhoahoc/{id}',[
		'as'=>'ten-khoa-hoc',
		'uses'=>'AjaxController@getTenkhoahoc'
	]);
	Route::get('lop/{id}',[
		'as'=>'ajax-lop',
		'uses'=>'AjaxController@getLop'
	]);

});
Route::group(['prefix'=>'dangnhap'], function(){
	//Gọi Route dangnhap   domain/dangnhap/ 
	Route::get('dangnhapcanbo',[
		'as'=>'dang-nhap-can-bo',
		'uses'=>'DangNhapController@getDangnhapcanbo'
	]);
	Route::post('dangnhaphocvien',[
		'as'=>'dang-nhap-hoc-vien',
		'uses'=>'DangNhapController@postDangnhaphocvien'
	]);
	Route::post('dangnhapcanbonhapchungchi',[
		'as'=>'dang-nhap-can-bo-nhap-chung-chi',
		'uses'=>'DangNhapController@postDangnhapcanbonhapchungchi'
	]);
	Route::get('dangxuat',[
		'as'=>'dang-xuat',
		'uses'=>'DangNhapController@getLogout'
	]);
	Route::get('dangxuatcanbo',[
		'as'=>'dang-xuat-can-bo',
		'uses'=>'DangNhapController@getLogoutcanbo'
	]);
});
Route::group(['prefix'=>'thongke'],function(){

	Route::get('thongkethanhtich',[
		'as'=>'thong-ke-thanh-tich',
		'uses'=>'ThongKeController@getThongkethanhtich'
	]);
	Route::get('thongketxeploai',[
		'as'=>'thong-ke-xep-loai',
		'uses'=>'ThongKeController@getThongketxeploai'
	]);
});

Route::get('api/get_tenlop', function(Request $req){
  $input = $req->input('option');
  $khoahoc = DB::table('khoahoc')->select('TenKhoa')
  				->where('ID', $input)
                  ->first();
  #$courses = DB::table('courses')->lists('level');
  $TenKhoa = $khoahoc->TenKhoa;    
  return response($TenKhoa);
});

Route::get('api/get_lophoc', function(Request $req){
	$input = $req->input('option');
	$khoahoc = DB::table('khoahoc')->join('lophoc','lophoc.ID_KhoaHoc','khoahoc.ID')
					->select('lophoc.ID as ID','TenLop')
					->where('khoahoc.ID', $input)
					->get();
	#$courses = DB::table('courses')->lists('level');
	dd($khoahoc);     
	return response($khoahoc);
  });

