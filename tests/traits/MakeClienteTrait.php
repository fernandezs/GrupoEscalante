<?php

use Faker\Factory as Faker;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;

trait MakeClienteTrait
{
    /**
     * Create fake instance of Cliente and save it in database
     *
     * @param array $clienteFields
     * @return Cliente
     */
    public function makeCliente($clienteFields = [])
    {
        /** @var ClienteRepository $clienteRepo */
        $clienteRepo = App::make(ClienteRepository::class);
        $theme = $this->fakeClienteData($clienteFields);
        return $clienteRepo->create($theme);
    }

    /**
     * Get fake instance of Cliente
     *
     * @param array $clienteFields
     * @return Cliente
     */
    public function fakeCliente($clienteFields = [])
    {
        return new Cliente($this->fakeClienteData($clienteFields));
    }

    /**
     * Get fake data of Cliente
     *
     * @param array $postFields
     * @return array
     */
    public function fakeClienteData($clienteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'num_cliente' => $fake->randomDigitNotNull,
            'nombre' => $fake->word,
            'telefono' => $fake->word,
            'email' => $fake->word,
            'doc_tipo' => $fake->word,
            'doc_numero' => $fake->word,
            'tipo' => $fake->word,
            'direccion' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $clienteFields);
    }
}
