<?php

use Faker\Factory as Faker;
use App\Models\Empleado;
use App\Repositories\EmpleadoRepository;

trait MakeEmpleadoTrait
{
    /**
     * Create fake instance of Empleado and save it in database
     *
     * @param array $empleadoFields
     * @return Empleado
     */
    public function makeEmpleado($empleadoFields = [])
    {
        /** @var EmpleadoRepository $empleadoRepo */
        $empleadoRepo = App::make(EmpleadoRepository::class);
        $theme = $this->fakeEmpleadoData($empleadoFields);
        return $empleadoRepo->create($theme);
    }

    /**
     * Get fake instance of Empleado
     *
     * @param array $empleadoFields
     * @return Empleado
     */
    public function fakeEmpleado($empleadoFields = [])
    {
        return new Empleado($this->fakeEmpleadoData($empleadoFields));
    }

    /**
     * Get fake data of Empleado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEmpleadoData($empleadoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'fecha_ingreso' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $empleadoFields);
    }
}
