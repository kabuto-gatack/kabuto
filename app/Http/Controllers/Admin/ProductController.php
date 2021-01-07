<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Product::paginate(10);

        return view('admin.product.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cates = Category::getcate();
        return view('admin.product.create')->with('cates',$cates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        //
        $ProModel = new Product;//实例化对象
        //写入数据库
        $ProModel->pid = $request->pid;
        $ProModel->productname = $request->productname;
        $ProModel->keyword = $request->keyword;
        $ProModel->desc = $request->desc;
        $ProModel->remark = $request->remark;
        $ProModel->recommend = $request->recommend?$request->recommend:0;
        $ProModel->read = $request->read;
        $ProModel->alt = $request->alt;
        $ProModel->contents = strip_tags($request->contents);
        //导入图片
        if($request->file('picture')){
            $ProModel->picture = $request->file('picture')->store('product');
        }

        //调用操作提示代码
        operation($ProModel->save(),'添加');

        return redirect(route('admin.product.index'));
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
    public function edit(Product $product)
    {
        //
        $cates = Category::getcate();
        return view('admin.product.edit')->with('cates',$cates)->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        //
        $ProModel = Product::find($id);
        $ProModel->pid = $request->pid;
        $ProModel->productname = $request->productname;
        $ProModel->keyword = $request->keyword;
        $ProModel->desc = $request->desc;
        $ProModel->remark = $request->remark;
        $ProModel->recommend = $request->recommend?$request->recommend:0;
        $ProModel->read = $request->read?$request->read:0;
        $ProModel->alt = $request->alt;
        $ProModel->contents = $request->contents;
        if($request->file('picture')){
             //删除旧图片
             Storage::delete($ProModel->picture);

            $ProModel->picture = $request->file('picture')->store('product');
        }
        operation($ProModel->save(),'修改');
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //实现单条删除和批量删除
        
        $ids[] = '';//定义一个空数组

        if($id != 0){

            $ids[] = $id;//将单条删除的id传入数组

        }else{

            if($request->has('ids')){

                $ids = $request->ids;//将批量删除的id传入数组

            }

        }

        $content = Product::destroy($ids);//删除操作

        operation($content>0,'删除');

        return redirect(route('admin.product.index'));

    }
}
