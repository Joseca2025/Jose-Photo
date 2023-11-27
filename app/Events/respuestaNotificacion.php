<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class respuestaNotificacion implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $idnoti;

    public function __construct($idnoti)
    {
        $this->idnoti = $idnoti;
      
    }


    public function broadcastOn()
    {
        return 'respuesta-channel';
    }

    public function broadcastAs()
    {
        return "respuesta-event";
    }
}
