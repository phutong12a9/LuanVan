<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ketquathi extends Model
{
	protected $fillable = [
    	 'ID_LopHoc', 'DiemNghe', 'DiemNoi','DiemDoc','DiemViet','DiemLyThuyet','DiemThucHanh','KetQua','GhiChu'
    ];
     protected $primarykey ='ID';
    protected $table = 'ketquathi';
    public $timestamps = false;
}
