<?php

namespace App\Listeners;

use App\Banneritem;
use App\Events\BannerDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class BannerDeleteListener
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
     * @param  BannerDeleteEvent  $event
     * @return void
     */
    public function handle(BannerDeleteEvent $event)
    {
        //当banner删除时，banneritem对应的数据也会删除
        // $banneritem = Banneritem::where('banner_id','=',$event->banner->id)->get();
        // foreach ($banneritem as $key => $value) {
        //     if ($value->picture != "") {
        //         Storage::delete($value->picture);
        //     }
        // }
        // Banneritem::where('banner_id','=',$event->banner->id)->delete();

        //第二个方法 需要配合banneritem监听器使用
        $banneritem = Banneritem::where('banner_id','=',$event->banner->id)->get();
        $banneritem ->each(function ($item,$key){
            $item->delete();
        });
    }
}
