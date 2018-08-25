<?php

namespace App\Listeners;

use App\Events\ReparacionFueCreada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\EstadoReparacion;
use Carbon\Carbon;

class CrearPrimerEstadoReparacion
{

    /**
     * Handle the event.
     *
     * @param  ReparacionFueCreada  $event
     * @return void
     */
    public function handle(ReparacionFueCreada $event)
    {
        $reparacion = $event->reparacion;
        $estado = new EstadoReparacion();
        $estado->reparacion_id = $reparacion->id;
        $estado->estado_id = 1;
        $estado->user_id = auth()->user()->id;
        $estado->fecha = Carbon::now();
        $estado->detalle = 'Estado Inicial en la reparacion';
        $estado->save();
    }
}
