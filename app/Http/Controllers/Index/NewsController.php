<?php

namespace App\Http\Controllers\Index;

use App\Banner;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $banner;

    public function __construct()
    {
        $banneritem = Banner::where('entitle','=','Real-time-news')->first();

        $this->banner = isset($banneritem)?$banneritem->banneritem[0]:"";
    }

    //新闻列表页面
    public function index(){

        $list = News::OrderBy('created_at','Desc')->OrderBy('id','Desc')->paginate(10);

        return view('index.news.index')->with('list',$list)->with('banner',$this->banner);

    }

    //新闻详情页面
    public function show(News $news){

        News::where('id','=',$news->id)->increment('read',1);

        return view('index.news.show')->with('news',$news)->with('banner',$this->banner);
    }
}
