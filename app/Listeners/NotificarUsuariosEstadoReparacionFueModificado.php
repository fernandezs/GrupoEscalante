<?php

namespace App\Listeners;

use App\Events\EstadoReparacionFueModificado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use App\Models\EstadoReparacion;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EstadoReparacionFueModificado as NotificarEstado;

class NotificarUsuariosEstadoReparacionFueModificado
{
    public $estado;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(EstadoReparacion $estado)
    {
        $this->estado = $estado;
    }

    /**
     * Handle the event.
     *
     * @param  EstadoReparacionFueModificado  $event
     * @return void
     */
    public function handle(EstadoReparacionFueModificado $event)
    {
        //obtiene todos los usuarios excepto el que acaba de crear la reparacion
        $users = User::exceptLoggedIn();

        //Envia una notificacion a todos los usuarios consultados
        Notification::send($users, new NotificarEstado($event->estado));
    }
}
