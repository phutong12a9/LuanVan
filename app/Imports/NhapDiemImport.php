<?php

namespace App\Imports;

use App\ketquathi;
use App\lop;
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
		return 3;
	}
	public function model(array $row) {
		$validator = Validator::make($row, [
			'0' => [
				'unique:ketquathi,ID_LopHoc',

			],
		]);
		if ($validator->fails()) {
			return null;
		}
		$idlop = Request()->lop;
		$loailophoc = DB::select('SELECT  DISTINCT TenDanhMuc
                                    FROM danhmuc,chungchi,khoahoc,lophoc
                                    WHERE   danhmuc.ID = chungchi.ID_DanhMuc
                                        AND chungchi.ID = khoahoc.ID_ChungChi
                                        AND khoahoc.ID = lophoc.ID_KhoaHoc
                                        AND lophoc.ID = ?', [$idlop]);
		$tenchungchi = $loailophoc[0]->TenDanhMuc;
		$TrangThai = new lop;
		$arr['TrangThai'] = 'Đã Nhập Điểm';

		if ($tenchungchi == "Chứng Chỉ Tiếng Anh" || $tenchungchi == "Chứng Chỉ Tiếng Nhật" || $tenchungchi == "Chứng Chỉ Tiếng Pháp") {
			return new ketquathi([
				'ID_LopHoc' => $row[0],
				'DiemNghe' => $row[5],
				'DiemNoi' => $row[6],
				'DiemDoc' => $row[7],
				'DiemViet' => $row[8],
				'KetQua' => $row[9],
				'GhiChu' => $row[10],
				$TrangThai::where('ID', $row[0])->update($arr),
			]);
		}
		if ($tenchungchi == "Chứng Chỉ Tin Học Căn Bản" || $tenchungchi == "Chứng Chỉ Tin Học Nâng Cao") {
			return new ketquathi([
				'ID_LopHoc' => $row[0],
				'DiemLyThuyet' => $row[5],
				'DiemThucHanh' => $row[6],
				'KetQua' => $row[7],
				'GhiChu' => $row[8],
				$TrangThai::where('ID', $row[0])->update($arr),
			]);
		}

	}
}
