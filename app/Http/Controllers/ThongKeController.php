<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;

class ThongKeController extends Controller {
	public function getThongketxeploai() {
		// Danh sách năm từ 2010 đến năm hiện tại
		$ListYear = array();
		$NowYear = Carbon::now()->year;
		for ($i = $NowYear; $i >= 2020; $i--) {
			array_push($ListYear, $i);
		}

		// Khởi tạo mảng rỗng
		$XuatSac = array();
		$Gioi = array();
		$Kha = array();
		$TB = array();
		$Yeu = array();
		$Dat = array();
		$KhongDat = array();
		// $hocvien = hocviendangky::whereYear('');
		//Đếm học viên xuất sắc từ tháng 1 đến tháng 12
		for ($i = 1; $i <= 12; $i++) {
			$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', 2021)->whereMonth('ThoiGian', $i)->where('XepLoai', 'Xuất Sắc')->count('ID');
			array_push($XuatSac, $thang[$i]); //Thêm học viên vào mảng
		}
		//Đếm học viên Giỏi từ tháng 1 đến tháng 12
		for ($i = 1; $i <= 12; $i++) {
			$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', 2021)->whereMonth('ThoiGian', $i)->where('XepLoai', 'Giỏi')->count('ID');
			array_push($Gioi, $thang[$i]);
		}
		//Đếm học viên Khá từ tháng 1 đến tháng 12
		for ($i = 1; $i <= 12; $i++) {
			$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', 2021)->whereMonth('ThoiGian', $i)->where('XepLoai', 'Khá')->count('ID');
			array_push($Kha, $thang[$i]); //Thêm học viên vào mảng
		}
		//Đếm học viên Trung Bình từ tháng 1 đến tháng 12
		for ($i = 1; $i <= 12; $i++) {
			$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', 2021)->whereMonth('ThoiGian', $i)->where('XepLoai', 'Trung Bình')->count('ID');
			array_push($TB, $thang[$i]); //Thêm học viên vào mảng
		}
		//Đếm học viên yếu từ tháng 1 đến tháng 12
		for ($i = 1; $i <= 12; $i++) {
			$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', 2021)->whereMonth('ThoiGian', $i)->where('XepLoai', 'Yếu')->count('ID');
			array_push($Yeu, $thang[$i]); //Thêm học viên vào mảng
		}
		for ($i = 1; $i <= 12; $i++) {
			$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', 2021)->whereMonth('ThoiGian', $i)->where('KetQua', 'Đạt')->count('ID');
			array_push($Dat, $thang[$i]); //Thêm học viên vào mảng
		}
		for ($i = 1; $i <= 12; $i++) {
			$thang[$i] = DB::table('ketquathi')->whereYear('ThoiGian', 2021)->whereMonth('ThoiGian', $i)->where('KetQua', 'Không Đạt')->count('ID');
			array_push($KhongDat, $thang[$i]); //Thêm học viên vào mảng
		}
		// Tính tổng
		$TongDat = array_sum($Dat);
		$TongKhongDat = array_sum($KhongDat);
		$TongXS = array_sum($XuatSac);
		$TongG = array_sum($Gioi);
		$TongK = array_sum($Kha);
		$TongTB = array_sum($TB);
		$TongY = array_sum($Yeu);
		$TongXepLoai = $TongXS + $TongG + $TongK + $TongTB + $TongY;
		$TongThanhTich = $TongDat + $TongKhongDat;

		// Tính %
		$pt_XS = ($TongXS / $TongXepLoai) * 100;
		$pt_G = ($TongG / $TongXepLoai) * 100;
		$pt_K = ($TongK / $TongXepLoai) * 100;
		$pt_TB = ($TongTB / $TongXepLoai) * 100;
		$pt_Y = ($TongY / $TongXepLoai) * 100;
		$pt_D = ($TongDat / $TongThanhTich) * 100;
		$pt_KD = ($TongKhongDat / $TongThanhTich) * 100;

		return view('thongke.thongkexeploai', compact('Dat', 'KhongDat', 'XuatSac', 'Gioi', 'Kha', 'TB', 'Yeu', 'TongXepLoai', 'TongXS', 'TongG', 'TongK', 'TongTB', 'TongY', 'TongThanhTich', 'TongDat', 'TongKhongDat', 'pt_XS', 'pt_G', 'pt_K', 'pt_TB', 'pt_Y', 'pt_D', 'pt_KD', 'ListYear'));
	}
	public function getThongkethanhtich() {
		return view('thongke.thongkethanhtich');
	}
}
