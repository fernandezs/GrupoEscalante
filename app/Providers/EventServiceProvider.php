<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ReparacionFueCreada' => [
            'App\Listeners\CrearPrimerEstadoReparacion',
            'App\Listeners\NotificarUsuariosReparacionCreada',
        ],
        'App\Events\EstadoReparacionCreado' => [
            'App\Listeners\ActualizarEstadoEnReparacion',
            'App\Listeners\NotificarUsuariosEstadoReparacionCreado',
        ],
        'App\Events\EstadoReparacionFueModificado' => [
            'App\Listeners\NotificarUsuariosEstadoReparacionFueModificado',
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
