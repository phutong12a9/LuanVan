<?php

namespace App\Imports;

use App\ketquathi;
use App\danhsachthi;
use DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class NhapDiemImport implements ToModel, WithStartRow {
	/**
	 * @param array $row
	 *
	 * @return \Illuminate\Database\Eloquent\Model|null
	 */
	public function __construct($errors = []) {
		$this->errors = $errors;
	}
	public function startRow(): int {
		return 4;
	}
	public function model(array $row) {
		$validator = Validator::make($row, [
			'0' => [
				'unique:ketquathi,ID_DanhSachThi',

			],
		]);
		if ($validator->fails()) {
			return null;
		}
		$chungchi = Request()->tenchungchi;
		$TrangThai = new danhsachthi;
		$arr['TrangThai']       = 'Đã Nhập Điểm';
		if ($chungchi == "TOEIC") {
			return new ketquathi([
				'ID_DanhSachThi' => $row[0],
				'DiemNghe' => $row[5],
				'DiemDoc' => $row[6],
				'KetQua' => $row[5]+$row[6],
				'GhiChu' => $row[8],
				'ThoiGian'=> date('Y-m-d'),
				$TrangThai::where('ID', $row[0])->update($arr),
			]);
		}
		elseif($chungchi == "IELTS")
		{
			return new ketquathi([
				'ID_DanhSachThi' => $row[0],
				'DiemNghe' => $row[5],
				'DiemNoi' => $row[6],
				'DiemDoc' => $row[7],
				'DiemViet' => $row[8],
				'KetQua' => $row[5]+ $row[6]+ $row[7]+ $row[8],
				'GhiChu' => $row[10],
				'ThoiGian'=> date('Y-m-d'),
				$TrangThai::where('ID', $row[0])->update($arr),
			]);
		}
		elseif($chungchi== "Tin Học"){
			
			return new ketquathi([
				'ID_DanhSachThi' => $row[0],
				'DiemLyThuyet' => $row[5],
				'DiemThucHanh' => $row[6],
				'KetQua' => ($row[5]+$row[6])/2,
				'GhiChu' => $row[8],
				'ThoiGian'=> date('Y-m-d'),
				$TrangThai::where('ID', $row[0])->update($arr),
			]);
		}
	}
}
