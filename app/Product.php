<?php

namespace App;

use App\Events\ProductDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //引入产品分类中的数据
    public function category(){
        return $this->belongsTo('App\Category','pid');
    }

    //模型中的触发事件
    protected $dispatchesEvents = [
        'deleted' => ProductDeleteEvent::class,
    ];
}
