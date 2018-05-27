<?php

use Faker\Factory as Faker;
use App\Models\Articulo;
use App\Repositories\ArticuloRepository;

trait MakeArticuloTrait
{
    /**
     * Create fake instance of Articulo and save it in database
     *
     * @param array $articuloFields
     * @return Articulo
     */
    public function makeArticulo($articuloFields = [])
    {
        /** @var ArticuloRepository $articuloRepo */
        $articuloRepo = App::make(ArticuloRepository::class);
        $theme = $this->fakeArticuloData($articuloFields);
        return $articuloRepo->create($theme);
    }

    /**
     * Get fake instance of Articulo
     *
     * @param array $articuloFields
     * @return Articulo
     */
    public function fakeArticulo($articuloFields = [])
    {
        return new Articulo($this->fakeArticuloData($articuloFields));
    }

    /**
     * Get fake data of Articulo
     *
     * @param array $postFields
     * @return array
     */
    public function fakeArticuloData($articuloFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cod_articulo' => $fake->randomDigitNotNull,
            'categoria_id' => $fake->randomDigitNotNull,
            'nombre' => $fake->word,
            'descripcion' => $fake->text,
            'marca_id' => $fake->randomDigitNotNull,
            'precio_costo' => $fake->word,
            'precio_venta' => $fake->word,
            'cantidad' => $fake->randomDigitNotNull,
            'cantidad_minima' => $fake->randomDigitNotNull,
            'foto' => $fake->word,
            'nro_cabezal' => $fake->randomDigitNotNull,
            'estado' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $articuloFields);
    }
}
