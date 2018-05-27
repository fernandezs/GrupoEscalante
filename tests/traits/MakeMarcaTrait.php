<?php

use Faker\Factory as Faker;
use App\Models\Marca;
use App\Repositories\MarcaRepository;

trait MakeMarcaTrait
{
    /**
     * Create fake instance of Marca and save it in database
     *
     * @param array $marcaFields
     * @return Marca
     */
    public function makeMarca($marcaFields = [])
    {
        /** @var MarcaRepository $marcaRepo */
        $marcaRepo = App::make(MarcaRepository::class);
        $theme = $this->fakeMarcaData($marcaFields);
        return $marcaRepo->create($theme);
    }

    /**
     * Get fake instance of Marca
     *
     * @param array $marcaFields
     * @return Marca
     */
    public function fakeMarca($marcaFields = [])
    {
        return new Marca($this->fakeMarcaData($marcaFields));
    }

    /**
     * Get fake data of Marca
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMarcaData($marcaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $marcaFields);
    }
}
