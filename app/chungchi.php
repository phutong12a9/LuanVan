<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chungchi extends Model
{
    protected $table = 'chungchi';
    public $timestamps = false;
    public function danhmucchungchi(){
    	return $this->belongsTo('App\danhmucchungchi','ID_DanhMuc','ID'); // một chứng chỉ chỉ thuộc về một danh mục chứng chỉ
    }
    public function lophoc(){
    	return $this->hasMany('App\lophoc','ID_ChungChi','ID'); // một chứng chỉ có nhiều lớp học
    }
    public function xetduyet(){
    	return $this->hasMany('App\xetduyet','ID_ChungChi','ID'); // một chứng chỉ xét duyệt nhiều học viên
    }
}
