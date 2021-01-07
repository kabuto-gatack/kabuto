<?php

namespace App;

use App\Events\BanneritemDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Banneritem extends Model
{
    //模型访问器
    public function getIsshowAttribute($value)
    {
        return $value == 1?"显示":"隐藏";
    }

    //模型关联：获取Banner的信息
    public function banners(){
        return $this->belongsTo(Banner::class,'banner_id');
    }
    
    //模型中的触发事件
    protected $dispatchesEvents = [
        'deleted' => BanneritemDeleteEvent::class,
    ];
}
