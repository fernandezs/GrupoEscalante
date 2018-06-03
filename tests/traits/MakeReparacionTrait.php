<?php

use Faker\Factory as Faker;
use App\Models\Reparacion;
use App\Repositories\ReparacionRepository;

trait MakeReparacionTrait
{
    /**
     * Create fake instance of Reparacion and save it in database
     *
     * @param array $reparacionFields
     * @return Reparacion
     */
    public function makeReparacion($reparacionFields = [])
    {
        /** @var ReparacionRepository $reparacionRepo */
        $reparacionRepo = App::make(ReparacionRepository::class);
        $theme = $this->fakeReparacionData($reparacionFields);
        return $reparacionRepo->create($theme);
    }

    /**
     * Get fake instance of Reparacion
     *
     * @param array $reparacionFields
     * @return Reparacion
     */
    public function fakeReparacion($reparacionFields = [])
    {
        return new Reparacion($this->fakeReparacionData($reparacionFields));
    }

    /**
     * Get fake data of Reparacion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeReparacionData($reparacionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cod_factura' => $fake->randomDigitNotNull,
            'articulo_id' => $fake->randomDigitNotNull,
            'cliente_id' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'costo_reparacion' => $fake->word,
            'fecha_ingreso' => $fake->word,
            'estado' => $fake->word,
            'tipo_garantia' => $fake->word,
            'fecha_egreso' => $fake->word,
            'descripcion' => $fake->text,
            'dias_garantia' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $reparacionFields);
    }
}
