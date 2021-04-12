<?php

namespace App\Imports;

use Illuminate\Http\Request;
use App\xetduyet;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithStartRow;
class XetDuyetImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {   
        return new xetduyet([
            'ID_ChungChi'   => Request()->import_tenvanbang,
            'ID_DotCap'     => Request()->import_dotcap,
            'HoTenHV'       => $row[0],
            'GioiTinh'      => $row[1],
            'NgaySinh'      => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2])->format('Y-m-d'),
            'NoiSinh'       => $row[3],
            'NgayKiemTra'   => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('Y-m-d'),
            'XepLoai'       => $row[5],
            'NamTotNghiep'  => $row[6],
            'NgayKy'        => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7])->format('Y-m-d'),
            'SoHieu'        => $row[8],
            'SoVaoSo'       => $row[9],
            'TrangThai'     => $row[10],
        ]);
    }
}
