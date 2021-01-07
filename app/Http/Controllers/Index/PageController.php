<?php

namespace App\Http\Controllers\Index;

use App\Banner;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //
    protected $banner;

    public function __construct()
    {
        $banneritem = Banner::where('entitle','=','About Us')->first();

        $this->banner = isset($banneritem)?$banneritem->banneritem[0]:"";
    }

    //关于我们
    public function index(){
        //公司简介
        $list = Page::where('type','=',1)->first();
        //招贤纳士
        $data = Page::where('type','=',2)->get();
        //发展历程
        $result = Page::where('type','=',3)->OrderBy('created_at','Desc')->take(4)->get();

        return view('index.page.index')->with('list',$list)->with('data',$data)->with('result',$result)->with('banner',$this->banner);
    }
}
