<?php

use Faker\Factory as Faker;
use App\Models\EstadoReparacion;
use App\Repositories\EstadoReparacionRepository;

trait MakeEstadoReparacionTrait
{
    /**
     * Create fake instance of EstadoReparacion and save it in database
     *
     * @param array $estadoReparacionFields
     * @return EstadoReparacion
     */
    public function makeEstadoReparacion($estadoReparacionFields = [])
    {
        /** @var EstadoReparacionRepository $estadoReparacionRepo */
        $estadoReparacionRepo = App::make(EstadoReparacionRepository::class);
        $theme = $this->fakeEstadoReparacionData($estadoReparacionFields);
        return $estadoReparacionRepo->create($theme);
    }

    /**
     * Get fake instance of EstadoReparacion
     *
     * @param array $estadoReparacionFields
     * @return EstadoReparacion
     */
    public function fakeEstadoReparacion($estadoReparacionFields = [])
    {
        return new EstadoReparacion($this->fakeEstadoReparacionData($estadoReparacionFields));
    }

    /**
     * Get fake data of EstadoReparacion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEstadoReparacionData($estadoReparacionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'reparacion_id' => $fake->randomDigitNotNull,
            'estado_id' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'empleado_id' => $fake->randomDigitNotNull,
            'fecha' => $fake->word,
            'detalle' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $estadoReparacionFields);
    }
}
