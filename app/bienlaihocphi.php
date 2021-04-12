<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bienlaihocphi extends Model
{
    protected $table = 'bienlaihocphi';
    public $timestamps = false;
    public function hocviendangky(){
    	return $this->belongsTo('app\hocviendangky','ID_HocVienDK','ID');// một biên lai học phí chỉ chứa một ID học viên
    }
     public function canbo(){
    	return $this->belongsTo('app\hocviendangky','ID_CanBo','ID');// một biên lai học phí chỉ chứa một ID cán bộ
    }

}
