<?php

namespace App\Providers;

use App\Friend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

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
        //
        Schema::defaultStringLength(191);
        //扩展自定义验证规则
        Validator::extend('Checkbanneritem', function ($attribute, $value, $parameters, $validator) {
            return $value>0;
        });

        //获取系统配置信息并分配
        $config = $this->getConfig();
        View::share('config',$config);
        //获取友情链接信息并分配
        $friend = $this->getFriend();
        View::share('friend',$friend);
    }

    //获取系统配置信息
    public function getConfig()
    {
        $config = DB::table('config')->get();
        $arr = [];
        foreach ($config as $item){
            $arr[$item->name] = json_decode($item->config);
        }
        return $arr;
    }

    //获取友情链接信息
    public  function  getFriend(){
        $friend = Friend::OrderBy('created_at','Desc')->OrderBy('id','Desc')->OrderBy('sort','Desc')->get();
        return $friend;
    }
}
