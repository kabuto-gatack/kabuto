<?php

namespace App\Listeners;

use App\Events\PageDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class PageDeleteListener
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
     * @param  PageDeleteEvent  $event
     * @return void
     */
    public function handle(PageDeleteEvent $event)
    {
        //将获取到数据中的图片删除
        if ($event->page->picture != "") {
            Storage::delete($event->page->picture);
        }

    }
}
