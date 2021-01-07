<?php

namespace App\Events;

use App\Cases;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CasesDeleteEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $cases;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Cases $cases)
    {
        //接收数据
        $this->cases = $cases;
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
