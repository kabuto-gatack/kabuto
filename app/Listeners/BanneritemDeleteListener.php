<?php

namespace App\Listeners;

use App\Events\BanneritemDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class BanneritemDeleteListener
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
     * @param  BanneritemDeleteEvent  $event
     * @return void
     */
    public function handle(BanneritemDeleteEvent $event)
    {
        //第二个方法
        if ($event->banneritem->picture != "") {
            Storage::delete([$event->banneritem->picture]);
        }
        
    }
}
