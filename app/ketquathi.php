<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ketquathi extends Model
{
	protected $fillable = [
    	 'ID_DanhSachThi', 'DiemNghe', 'DiemNoi','DiemDoc','DiemViet','DiemLyThuyet','DiemThucHanh','KetQua','GhiChu','ThoiGian'
    ];
     protected $primarykey ='ID';
    protected $table = 'ketquathi';
    public $timestamps = false;
}
