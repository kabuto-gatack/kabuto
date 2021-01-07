<?php

namespace App;

use App\Events\CategoryDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    /**
     * 获取分类列表pid
     */
    public static function getcate(){
        $cates = self::get();
        /**
         * 如果获取重新分类的数据不使用静态方法，则需使用下面这行代码
         */
        // $cates = (new self())->makecate($cates);
        $cates = self::makecate($cates);
        return $cates;
    }

    /**
     * 获取到的数据重新分类
     */
    private static function makecate($data,$pid=0,$level=0){
        $arr=[];
        foreach($data as $item){
            if($item->pid == $pid){
                $item->level = $level;
                $arr[] = $item;
                $arr_tmp = self::makecate($data,$item->id,$level+1);
                $arr = array_merge($arr,$arr_tmp);
            }
        }
        return $arr;
    }
    
    //模型中的触发事件
    protected $dispatchesEvents = [
        'deleted' => CategoryDeleteEvent::class,
    ];

    /**
     * 获取指定分类的所有子类包括本身的id
     */
    public static function subclass($id){
        $class[] = $id;  //获取本身
        $data = self::all();   //获取全部数据
        $sub = self::makecate($data,$id);   //获取全部子数据
        foreach ($sub as $item) {
            $class[] = $item->id;
        }
        return $class;
    }

}
