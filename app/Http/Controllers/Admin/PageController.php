<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePage;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取招贤纳士的信息
        $list = Page::where("type",'=',2)->paginate(30);
        //加载招贤纳士的视图
        return view('admin.page.index')->with('list',$list);
    }

    //招贤纳士添加招聘页面
    public function recruit()
    {
        //渲染招贤纳士的招聘页面
        return view('admin.page.recruit');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取公司简介的信息
        $brief = Page::where("type",'=',1)->first();
        //加载公司简介的视图
        return view('admin.page.create')->with('brief',$brief);
    }

    public function course(){
        $list = Page::where('type','=',3)->paginate(30);
        //加载发展历程的视图
        return view('admin.page.course')->with('list',$list);
    }

    public function history(){

        //加载添加历程的视图
        return view('admin.page.history');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePage $request)
    {
        //写入数据库
        $data = [
            'type' => $request->type,
            'title' => $request->title,
            'contents' => isset($request->contents)?$request->contents:"",
            'contents1' => isset($request->contents1)?$request->contents:"",
            'contents2' => isset($request->contents2)?$request->contents:"",
        ];
        if ($request->file('picture')) {
            $data['picture'] = $request->file('picture')->store('page');

        }
        if ($request->file('picture1')){
            $data['picture1'] = $request->file('picture1')->store('page');
            $data['picture2'] = $request->file('picture2')->store('page');

        }
        //更新或创建数据
        switch ($request->type) {
            case "1":
                $result = Page::updateOrCreate(['type'=>1],$data);
                operation($result instanceof Page,'更新');
                return redirect(route('admin.page.create'));
                break;
            case "2":
                $result = Page::updateOrCreate(['title'=>$request->title],$data);
                operation($result instanceof Page,'添加');
                return redirect(route('admin.page.index'));
                break;
            case "3":
                $result = Page::updateOrCreate(['title' => $request->title,'contents' => $request->contents],$data);
                operation($result instanceof Page,'添加');
                return redirect(route('admin.page.course'));
                break;
        }

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
    public function edit(Page $page)
    {
        //渲染招贤纳士职位编辑页面，并获取数据进行显示
        return view('admin.page.edit')->with('page',$page);
    }

    public function hisedit(Page $page)
    {
        //渲染发展历程编辑页面
        return view('admin.page.hisedit')->with('page',$page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $PageModel = Page::find($id);//调用需要更新的数据
        $PageModel->title = $request->title;
        $PageModel->contents = $request->contents;

        if ($request->file('picture')) {
            //删除旧照片
            Storage::delete($PageModel->picture);

            $PageModel->picture = $request->file('picture')->store('page');
        }
        operation($PageModel->save(),'更新');
        if ($request->type==2) {
            return redirect(route('admin.page.index'));
        }else{
            return redirect(route('admin.page.course'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //单条删除或批量删除招贤纳士的数据
        $ids[] = "";//定义一个空数组

        if ($id != 0) {
            $ids[] = $id;
        }else{
            if ($request->has('ids')) {
                $ids = $request->ids;
            }
        }

        $result = Page::destroy($ids);

        operation($result>0,'删除');

        if ($request->type==2) {
            return redirect(route('admin.page.index'));
        }else{
            return redirect(route('admin.page.course'));
        }

    }
}
