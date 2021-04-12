<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chucvu extends Model
{
    protected $table = 'chucvu';
    public $timestamps = false;
    public function canbo(){
    	return $this->hasMany('app\canbo','ID_CV','ID'); // 1 chức vụ có thể có nhiều cán bộ
    }
}
