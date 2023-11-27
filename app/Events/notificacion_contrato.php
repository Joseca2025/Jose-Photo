<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class notificacion_contrato implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $idfotografo, $idorganizador, $idevento, $idpaquete_foto;

    public function __construct($idfotografo, $idorganizador, $idevento, $idpaquete_foto)
    {
        $this->idfotografo = $idfotografo;
        $this->idorganizador = $idorganizador;
        $this->idevento = $idevento;
        $this->idpaquete_foto = $idpaquete_foto;
    }

    public function broadcastOn()
    {
        return 'notificacion-channel';
    }

    public function broadcastAs()
    {
        return "notificacion-event";
    }
}
