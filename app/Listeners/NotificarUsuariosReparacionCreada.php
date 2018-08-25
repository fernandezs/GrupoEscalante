<?php

namespace App\Listeners;

use App\Events\ReparacionFueCreada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use App\Notifications\ReparacionFueCreada As ReparacionCreada;
use Illuminate\Support\Facades\Notification;
class NotificarUsuariosReparacionCreada
{
    /**
     * Handle the event.
     *
     * @param  ReparacionFueCreada  $event
     * @return void
     */
    public function handle(ReparacionFueCreada $event)
    {
        //obtiene todos los usuarios excepto el que acaba de crear la reparacion
        $users = User::exceptLoggedIn();
        //Envia una notificacion a todos los usuarios consultados
        Notification::send($users, new ReparacionCreada($event->reparacion));
    }
}
