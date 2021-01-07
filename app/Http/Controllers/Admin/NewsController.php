<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsPost;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = (new News)::paginate(15);
        //渲染列表页面
        return view("admin.news.index")->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //渲染新闻添加页面
        return view("admin.news.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsPost $request)
    {
        //插入数据(写入数据库)
        $ModelNews = new News;
        $ModelNews->newstitle = $request->newstitle;
        $ModelNews->keyword = $request->keyword;
        $ModelNews->desc = $request->desc;
        $ModelNews->remark = $request->remark;
        $ModelNews->read = $request->read;
        $ModelNews->alt = $request->alt;
        $ModelNews->contents = $request->contents;

        if ($request->file("picture")) {
            $ModelNews->picture = $request->file("picture")->store("news");
        }
        //调用操作提示代码
        operation($ModelNews->save(),'添加');

        return redirect(route('admin.news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
        return view('admin.news.edit')->with('news',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
        $data=[
            'newstitle' => $request->newstitle,
            'keyword' => $request->keyword,
            'desc' => $request->desc,
            'remark' => $request->remark,
            'read' => $request->read,
            'alt' => $request->alt,
            'contents' => $request->contents,
        ];

        if ($request->file('picture')) {
            //删除旧照片
            Storage::delete($news->picture);

            $data['picture'] = $request->file('picture')->store('news');
        }

        //删除富文本编辑器的图片
        if ($count = substr_count($news->contents,'img')){

            imgPathdel($count,$news->contents,$request->contents);

        }

        $ModelNews = new News;
        $result = $ModelNews::where('id','=',$news->id)->update($data);

        operation($result>0,"修改");

        return redirect(route("admin.news.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //删除数据
        $result = $news->delete();

        //删除旧照片
        Storage::delete($news->picture);
        //删除富文本编辑器的图片
        if ($count = substr_count($news->contents,'img') > 0){

            imgPathdel($count,$news->contents);

        }

        operation($result,'删除');

        return redirect(route('admin.news.index'));
    }
}
