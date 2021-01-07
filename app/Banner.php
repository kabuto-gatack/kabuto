<?php

namespace App;

use App\Events\BannerDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //去掉默认时间戳
    public $timestamps = false;

    //模型中的触发事件
    protected $dispatchesEvents = [
        'deleted' => BannerDeleteEvent::class,
    ];

    //关联模型,获取banneritem的数据,一对多
    protected function banneritem(){
        return $this->hasMany(Banneritem::class,'banner_id');
    }
}
