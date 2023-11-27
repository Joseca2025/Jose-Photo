<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class aparecesFotoApi implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $idevento;

    public function __construct($idevento)
    {
        $this->idevento = $idevento;
    }

    public function broadcastOn()
    {
        return 'faceapi-channel';
    }

    public function broadcastAs()
    {
        return "faceapi-event";
    }
}
