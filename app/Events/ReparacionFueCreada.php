<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Reparacion;
class ReparacionFueCreada
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $reparacion;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Reparacion $reparacion)
    {
        $this->reparacion = $reparacion;
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
