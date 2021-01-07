<?php

namespace App\Listeners;

use App\Events\CategoryDeleteEvent;
use App\Product;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategoryDeleteListener
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
     * @param  CategoryDeleteEvent  $event
     * @return void
     */
    public function handle(CategoryDeleteEvent $event)
    {
        //删除product中对应的数据
        foreach ($event->category as $key => $value) {
            $product = Product::where('pid','=',$value->id)->get();//通过pid获取对应的数据
            $product->each(function ($item,$key){
                $item->delete();
            });
        }           
    }
}
