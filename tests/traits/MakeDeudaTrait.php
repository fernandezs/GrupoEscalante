<?php

use Faker\Factory as Faker;
use App\Models\Deuda;
use App\Repositories\DeudaRepository;

trait MakeDeudaTrait
{
    /**
     * Create fake instance of Deuda and save it in database
     *
     * @param array $deudaFields
     * @return Deuda
     */
    public function makeDeuda($deudaFields = [])
    {
        /** @var DeudaRepository $deudaRepo */
        $deudaRepo = App::make(DeudaRepository::class);
        $theme = $this->fakeDeudaData($deudaFields);
        return $deudaRepo->create($theme);
    }

    /**
     * Get fake instance of Deuda
     *
     * @param array $deudaFields
     * @return Deuda
     */
    public function fakeDeuda($deudaFields = [])
    {
        return new Deuda($this->fakeDeudaData($deudaFields));
    }

    /**
     * Get fake data of Deuda
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDeudaData($deudaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'cliente_id' => $fake->randomDigitNotNull,
            'detalle' => $fake->word,
            'estado' => $fake->word,
            'importe_total' => $fake->word,
            'fecha_cobro' => $fake->word,
            'interes' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $deudaFields);
    }
}
