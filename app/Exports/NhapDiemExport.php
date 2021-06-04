<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class NhapDiemExport implements FromView, ShouldAutoSize, WithEvents, WithTitle {
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View{
        $idchungchi = Request()->chungchi;
        $tenchungchi = DB::table('chungchi')->select('TenChungChi')->where('ID',$idchungchi)->first();
        $lopthi = Request()->lopthi;
        $tenlopthi = DB::table('lopthi')->select('TenLopThi')->where('ID',$lopthi)->first();
        $trangthai = Request()->trangthai;
        if ($trangthai =="Chưa Nhập Điểm") {
            $hocvien = DB::select("SELECT hocvien.*,danhsachthi.ID as ID
                                FROM hocvien,hocviendangky,danhsachthi,lopthi
                                WHERE hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND danhsachthi.TrangThai = 'Chưa Nhập Điểm'
                                    AND lopthi.ID =? ",[$lopthi]);
        }
        else{
           $hocvien = DB::select("SELECT hocvien.*,ketquathi.*,danhsachthi.ID as ID 
                                FROM hocvien,hocviendangky,danhsachthi,lopthi,ketquathi
                                WHERE hocvien.ID = hocviendangky.ID_HocVien
                                    AND hocviendangky.ID = danhsachthi.ID_HocVienDK
                                    AND danhsachthi.ID_LopThi = lopthi.ID
                                    AND danhsachthi.ID = ketquathi.ID_DanhSachThi
                                    AND danhsachthi.TrangThai = ?
                                    AND lopthi.ID = ? ",[$trangthai,$lopthi]);  
        }
        return view('export.nhapdiemexport', [
            'hocvien' => $hocvien,
            'tenchungchi' =>$tenchungchi,
            'trangthai' => $trangthai,
            'tenlopthi' => $tenlopthi
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
                    // 'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];
        return [
            AfterSheet::class => function (AfterSheet $event) use ($styleArray) {
                $cellRange = 'A3:I45';
                $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
            },
        ];
    }

}
