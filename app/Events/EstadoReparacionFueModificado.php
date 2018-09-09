<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\EstadoReparacion;

class EstadoReparacionFueModificado
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $estado;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(EstadoReparacion $estado)
    {
        $this->estado = $estado;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
