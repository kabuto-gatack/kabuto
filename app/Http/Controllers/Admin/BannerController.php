<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBanner;
use Exception;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $list = Banner::get();//获取数据库的数据
        return view('admin.banner.index')->with('list',$list);//渲染banner列表页面
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //渲染添加banner页面
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBanner $request)
    {
        //写入数据库
        $BannerModel = new Banner;//实例化对象
        $BannerModel->title = $request->title;//名称
        $BannerModel->entitle = $request->entitle;//英文名称
        //捕捉并接收错误信息
        try{
            operation($BannerModel->save(),'添加');//操作
        }catch(Exception $e){
            //设置闪存数据
            $request->session()->flash('errormsg',$e->getMessage());//返回错误信息

            return redirect()->back();//返回上传页面(当前页面)
        }
        
        return redirect(route('admin.banner.index'));//放回界面
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
    public function edit(Banner $banner)
    {
        //渲染banner修改的页面
        return view('admin.banner.edit')->with('banner',$banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBanner $request, $id)
    {
        //
        $BannerModel = Banner::find($id);
        $BannerModel->title = $request->title;
        $BannerModel->entitle = $request->entitle;
        operation($BannerModel->save(),'修改');
        return redirect(route('admin.banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        
        operation($banner->delete(),'删除');
        return redirect(route('admin.banner.index'));
    }
}
