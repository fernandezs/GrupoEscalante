<?php

namespace App\Listeners;

use App\Events\EstadoReparacionCreado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class ActualizarEstadoEnReparacion
{
    /**
     * Handle the event.
     *
     * @param  EstadoReparacionCreado  $event
     * @return void
     */
    public function handle(EstadoReparacionCreado $event)
    {
        $estado = $event->estado->estado;
        $reparacion = $event->estado->reparacion;
        $reparacion->estado = $estado->estado;
        if( $estado == 'ENTREGADO'){
            $reparacion->fecha_egreso = Carbon::now();
        }
        $reparacion->save();

    }
}
