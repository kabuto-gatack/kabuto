<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){
        // return asset(__ADMIN__);//路径config>static.php
        return view("admin.index.index");//渲染视图
    }

    //富文本编辑器图片上传接口
    public function imguploads(Request $request){
        $data=[
            'code' => 200,
            'url' => '',
        ];
        if ($request->file("file")) {
            $data['url'] = "/"."uploads/".$request->file("file")->store("picture");
        }else{
            $data['code'] = 400;
        }
        return $data;
    }
}
