<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCate;
use App\Http\Requests\CategoryEdit;

class CategoryController extends Controller
{
    //分类列表
    public function index(){
        //列表排序
        $list = Category::getcate();

        return view("admin.category.index")->with('list',$list);
    }
    //添加分类
    public function create(CategoryCate $request){
        if ($request->isMethod("POST")) {
            /**
             * 写入数据库
             */
            $Category = new Category;
            $Category->name = $request->name;
            $Category->store = $request->store;
            $Category->pid = $request->pid;
            $result = $Category->save();
            //调用操作提示代码
            operation($result,"添加");
            
            return redirect(route('admin.category.index'));
        }
        $cates = Category::getcate();
        return view("admin.category.create")->with('cates',$cates);
    }
    /**
     * 编辑
     */
    public function edit(CategoryEdit $request,Category $cate){
        if ($request->isMethod("POST")) {
            $cate->name = $request->name;
            $cate->store = $request->store;
            $cate->pid = $request->pid;
            $result = $cate->save();
            operation($result,'编辑');
            return redirect(route('admin.category.index'));
        }
        $cates = Category::getcate();
        return view("admin.category.edit")->with('cate',$cate)->with('cates',$cates);
    }
    // 获取子类，保存在common.php中
    // public static function del($array,$id){
    //     $arr = array();
    //     foreach ($array as $key => $item) {
    //         if ($item->pid == $id) {
    //             $arr[] = $item;
    //             $arr_tmp = self::del($array,$item->id);
    //             $arr = array_merge($arr,$arr_tmp);
    //         }
    //     }
    //     return $arr;
    //}
    /**
     * 删除
     */
    public function desotry(Category $cate){    
        $cates = Category::getcate();
        $arr = del($cates,$cate->id);
        $arr[] = $cate;
        foreach ($arr as $value) {
            $result = $value->delete();
        }
        operation('$result','删除');
        return redirect(route('admin.category.index'));
    }

}

