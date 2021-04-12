<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class canbo extends Model
{
    protected $table = 'canbo';
    public $timestamps = false;
    public function chucvu(){
    	return $this->belongsTo('app\chucvu','ID_CV','ID');// một cán bộ có một chức vụ
    }
    public function bienlaihocphi(){
    	return $this->hasMany('app\bienlaihocphi','ID_CanBo','ID'); // một cán bộ có thể xét duyệt nhiều biên lai học phí
    }
}
