<?php

namespace App\Events;

use App\Banner;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BannerDeleteEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $banner;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Banner $banner)
    {
        //接收数据
        $this->banner = $banner;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
