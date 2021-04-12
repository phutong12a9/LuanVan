<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Auth;
use App\User;
use App\Hocvien;
use DB;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('master',function($view){
           if(session()->has('users')){
            $id = session('users')->ID;
            $HoTenHV = DB::table('users')->join('hocvien','ID_User','users.ID')->select('HoTenHV')->where('users.ID',$id)->get();
            $view->with('HoTenHV',$HoTenHV);
           }
            
        });

    }
}
