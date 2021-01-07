<?php

namespace App\Http\Controllers\Index;

use App\Banner;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $banner;

    public function __construct()
    {
        //获取banner
        $banneritem = Banner::where('entitle','=','Product-display')->first();

        $this->banner = isset($banneritem)?$banneritem->banneritem[0]:"";//因为获取到的是一个数组集合，所以得再获取里面的数据

    }

    //产品列表
    public function index(){
        //获取产品列表
        $list = Product::OrderBy('created_at','Desc')->OrderBy('id')->paginate(5);

        return view("index.product.index")->with('list',$list)->with('banner',$this->banner);
    }
    //产品详情
    public function show(Product $product){

        Product::where('id','=',$product->id)->increment('read',1);

        return view("index.product.show")->with('product',$product)->with('banner',$this->banner);

    }
}
