<?php

namespace App\Http\Controllers\Index;

use App\Banner;
use App\Cases;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){
        //获取首页轮播图banner
        $banner = Banner::where("entitle",'=','Home-banner')->first();
        //获取核心产品
        $product = Product::OrderBy('created_at','Desc')->OrderBy('id','Desc')->where('recommend','=',1)->take(4)->get();

        //获取案例
        $cases = Cases::OrderBy('created_at','Desc')->OrderBy('id','Desc')->OrderBy('sort','Desc')->take(4)->get();

        return view('index.index.home')->with('banner',$banner)->with('product',$product)->with('cases',$cases);

    }
}
