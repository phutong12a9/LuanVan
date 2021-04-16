<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelExport implements FromView, ShouldAutoSize, WithEvents, WithTitle {
	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function view(): View{
		$idvb = Request()->tenvb;
		$idkh = Request()->khoahoc;
		if ($idvb == "" && $idkh == "") {
			$hocvien = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, khoahoc.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai,  hocviendangky.XetDuyet as XetDuyet, NgayKy,SoHieu,SoVaoSo
                                FROM hocviendangky, hocvien, lop, ketquathi,khoahoc
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND lop.ID = ketquathi.ID_Lop
                                    AND hocviendangky.ID_Khoa = khoahoc.ID
                                    AND lop.TrangThai = "Đã Nhập Điểm"
                                    AND hocviendangky.XetDuyet = "Chờ duyệt"
                                ORDER BY ketquathi.ThoiGian DESC');
		} else if ($idkh == "") {
			$hocvien = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, khoahoc.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai, hocviendangky.XetDuyet as XetDuyet, NgayKy,SoHieu,SoVaoSo
                                FROM hocviendangky, hocvien, lop, ketquathi,khoahoc,chungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND lop.ID = ketquathi.ID_Lop
                                    AND hocviendangky.ID_Khoa = khoahoc.ID
                                    AND chungchi.ID = khoahoc.ID_ChungChi
                                    AND lop.TrangThai = "Đã Nhập Điểm"
                                    AND hocviendangky.XetDuyet = "Chờ duyệt"
                                    AND khoahoc.ID = lophoc.ID_KhoaHoc
                                    AND chungchi.ID = ?
                                ORDER BY ketquathi.ThoiGian DESC', [$idvb]);
		} else {
			$hocvien = DB::select('SELECT hocviendangky.ID as ID , hocvien.HoTenHV as HoTenHV, hocvien.GioiTinh as GioiTinh, hocvien.NgaySinh as NgaySinh, hocvien.NoiSinh as NoiSinh, khoahoc.ThoiGianThi as ThoiGianThi, ketquathi.XepLoai as XepLoai, hocviendangky.XetDuyet as XetDuyet, NgayKy,SoHieu,SoVaoSo
                                FROM hocviendangky, hocvien, lop, ketquathi,khoahoc,chungchi
                                WHERE   hocviendangky.ID_HocVien = hocvien.ID
                                    AND hocviendangky.ID = lop.ID_HocVienDK
                                    AND lop.ID = ketquathi.ID_Lop
                                    AND hocviendangky.ID_Khoa = khoahoc.ID
                                    AND chungchi.ID = khoahoc.ID_ChungChi
                                    AND lop.TrangThai = "Đã Nhập Điểm"
                                    AND hocviendangky.XetDuyet = "Chờ duyệt"
                                    AND khoahoc.ID = ?
                                ORDER BY ketquathi.ThoiGian DESC', [$idkh]);
		}
		return view('export.hocvienexport', [
			'hocvien' => $hocvien,
		]);
	}

	public function title(): string {
		return 'Sheet1';
	}

	public function registerEvents(): array
	{
		$styleArray = [
			'borders' => [
				'outline' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					//'color' => ['argb' => 'FFFF0000'],
				],
			],
		];
		return [
			AfterSheet::class => function (AfterSheet $event) use ($styleArray) {

				$cellRange = 'A3:I3'; // All headers
				$event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
			},
		];
	}

}
