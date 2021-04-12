<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends   Authenticatable {
    use Notifiable;

    protected $fillable = [
    	 'TaiKhoan', 'password', 'PhanQuyen',
    ];
    protected $primarykey ='ID';
    protected $table = 'users';
    protected $hidden = [
        'password', 'remember_token',
    ];
}

