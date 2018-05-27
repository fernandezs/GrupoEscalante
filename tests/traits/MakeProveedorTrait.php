<?php

use Faker\Factory as Faker;
use App\Models\Proveedor;
use App\Repositories\ProveedorRepository;

trait MakeProveedorTrait
{
    /**
     * Create fake instance of Proveedor and save it in database
     *
     * @param array $proveedorFields
     * @return Proveedor
     */
    public function makeProveedor($proveedorFields = [])
    {
        /** @var ProveedorRepository $proveedorRepo */
        $proveedorRepo = App::make(ProveedorRepository::class);
        $theme = $this->fakeProveedorData($proveedorFields);
        return $proveedorRepo->create($theme);
    }

    /**
     * Get fake instance of Proveedor
     *
     * @param array $proveedorFields
     * @return Proveedor
     */
    public function fakeProveedor($proveedorFields = [])
    {
        return new Proveedor($this->fakeProveedorData($proveedorFields));
    }

    /**
     * Get fake data of Proveedor
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProveedorData($proveedorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'nombre_contacto' => $fake->word,
            'telefono' => $fake->word,
            'pagina_web' => $fake->word,
            'email' => $fake->word,
            'domicilio' => $fake->word,
            'cod_postal' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $proveedorFields);
    }
}
