<?php

namespace App\Listeners;

use App\Events\CasesDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class CasesDeleteListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CasesDeleteEvent  $event
     * @return void
     */
    public function handle(CasesDeleteEvent $event)
    {
        //将获取到数据中的图片删除
        if ($event->cases->picture != '') {
            Storage::delete($event->cases->picture);
        }
    }
}
