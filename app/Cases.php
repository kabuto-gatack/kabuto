<?php

namespace App;

use App\Events\CasesDeleteEvent;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    //模型中的触发事件
    protected $dispatchesEvents = [
        'deleted' => CasesDeleteEvent::class,
    ];
}
