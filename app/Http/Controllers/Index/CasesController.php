<?php

namespace App\Http\Controllers\Index;

use App\Banner;
use App\Cases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CasesController extends Controller
{
    //
    protected $banner;

    public function __construct()
    {
        $banneritem = Banner::where('entitle','=','Successful Case')->first();

        $this->banner = isset($banneritem)?$banneritem->banneritem[0]:"";
    }

    //案例首页
    public function index(){

        $list = Cases::OrderBy('sort','Desc')->OrderBy('created_at','Desc')->OrderBy('id','Desc')->paginate(6);

        return view('index.cases.index')->with('list',$list)->with('banner',$this->banner);
    }
}
