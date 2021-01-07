<?php

namespace App;

use App\Events\PageDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //加入黑名单
    protected $guarded = [];

    //模型中的触发事件
    protected $dispatchesEvents = [
        'deleted' => PageDeleteEvent::class,
    ];
}
