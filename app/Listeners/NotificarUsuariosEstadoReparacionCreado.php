<?php

namespace App\Listeners;

use App\Events\EstadoReparacionCreado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\EstadoReparacionFueCreado;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class NotificarUsuariosEstadoReparacionCreado
{
    /**
     * Handle the event.
     *
     * @param  EstadoReparacionCreado  $event
     * @return void
     */
    public function handle(EstadoReparacionCreado $event)
    {
        //obtiene todos los usuarios excepto el que acaba de crear la reparacion
        $users = User::exceptLoggedIn();
        //Envia una notificacion a todos los usuarios consultados
        Notification::send($users, new EstadoReparacionFueCreado($event->estado));
    }
}
