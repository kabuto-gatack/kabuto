<?php

namespace App\Http\Controllers\Admin;

use App\Cases;
use App\Http\Requests\StoreCases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Cases::OrderBy('sort','Desc')->OrderBy('id')->paginate(15);
        return view("admin.cases.index")->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //渲染主视图
        return view('admin.cases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCases $request)
    {
        //
        $CasesModel = new Cases;//实例化对象
        //写入数据库
        $CasesModel->title = $request->title;
        $CasesModel->remark = $request->remark;
        $CasesModel->sort = $request->sort;
        $CasesModel->alt = $request->alt;
        if ($request->file('picture')) {
            $CasesModel->picture = $request->file('picture')->store('cases');
        }

        //调用操作提示代码
        operation($CasesModel->save(),'添加');

        //返回到主页面
        return redirect(route('admin.cases.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show(Cases $cases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit(Cases $case)
    {
        //渲染编辑页面
        return view('admin.cases.edit')->with('cases',$case);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCases $request,$id)
    {
        //检索该条数据
        $CasesModel = Cases::find($id);
        //更新该条数据
        $CasesModel->title = $request->title;
        $CasesModel->remark = $request->remark;
        $CasesModel->sort = $request->sort;
        $CasesModel->alt = $request->alt;
        if ($request->file('picture')){
            //删除旧照片
            $data = Storage::delete($CasesModel->picture);

            $CasesModel->picture = $request->file('picture')->store('cases');

        }
        //调用操作提示代码
        operation($CasesModel->save(),'修改');
        //返回到主界面
        return redirect(route('admin.cases.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //定义一个空数组
        $ids[] = "";

        if ($id != 0) {
            $ids[] = $id;//将单条删除的id传入数组
        }else{
            if ($request->has('ids')) {
                $ids = $request->ids;//将批量删除的id传入数组
            }
        }
        $content = Cases::destroy($ids);//刪除操作

        operation($content>0,'刪除');

        return redirect(route('admin.cases.index'));

    }

    //排序
    public function setsort(Request $request){
        //
        if ($request->isMethod("POST")) {
            $CasesModel = Cases::find($request->id);
            $CasesModel->sort = $request->sort;
            $result = $CasesModel->save();
        }
        if ($result>0) {
            return ['code' => 1,'msg' => '操作成功'];
        }else{
            return ['code' => 0,'msg' => '操作失败'];
        }
    }
}
