<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Banneritem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBanneritem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BanneritemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Banneritem::OrderBy('sort','Desc')->OrderBy('id')->get();
        return view('admin.banneritem.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $banners = Banner::all();
        return view('admin.banneritem.create')->with('banners',$banners);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBanneritem $request)
    {
        //

        $BanModel = new Banneritem;
        $BanModel->banner_id = $request->banner_id;
        $BanModel->title = $request->title;
        $BanModel->digest = $request->digest;
        $BanModel->sort = $request->sort;
        $BanModel->alt = $request->alt;
        $BanModel->isshow = isset($request->isshow)?$request->isshow:0;

        if ($request->file('picture')) {
            $BanModel->picture = $request->file('picture')->store('banneritem');
        }

        if ($BanModel->picture == "") {
            Session::flash('errormsg','图片不能为空');//设置闪存数据
            // $request->session()->flash('errormsg','图片不能为空');
            return redirect()->back();//返回上传页面(当前页面)
        }
        operation($BanModel->save(),'添加');
        return redirect(route('admin.banneritem.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banneritem $banneritem)
    {
        //
        $banners = Banner::all();
        return view('admin.banneritem.edit')->with('banneritem',$banneritem)->with('banners',$banners);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBanneritem $request, $id)
    {
        //
        $BanModel = Banneritem::find($id);
        $BanModel->banner_id = $request->banner_id;
        $BanModel->title = $request->title;
        $BanModel->digest = $request->digest;
        $BanModel->sort = $request->sort;
        $BanModel->alt = $request->alt;
        $BanModel->isshow = isset($request->isshow)?$request->isshow:0;

        if ($request->file('picture')) {
            Storage::delete($BanModel->picture);
            $BanModel->picture = $request->file('picture')->store('banneritem');
        }
        operation($BanModel->save(),'修改');
        return redirect(route('admin.banneritem.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //
        $result = Banneritem::destroy($id);
        operation($result>0,'删除');
        return redirect(route('admin.banneritem.index'));
    }

    //排序
    public function setsort(Request $request){
        //
        if ($request->isMethod("POST")) {
            $BanModel = Banneritem::find($request->id);
            $BanModel->sort = $request->sort;
            $result = $BanModel->save();
        }
        if ($result>0) {
            return ['code' => 1,'msg' => '操作成功'];
        }else{
            return ['code' => 0,'msg' => '操作失败'];
        }
    }
}
