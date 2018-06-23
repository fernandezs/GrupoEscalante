<?php

use Faker\Factory as Faker;
use App\Models\Nota;
use App\Repositories\NotaRepository;

trait MakeNotaTrait
{
    /**
     * Create fake instance of Nota and save it in database
     *
     * @param array $notaFields
     * @return Nota
     */
    public function makeNota($notaFields = [])
    {
        /** @var NotaRepository $notaRepo */
        $notaRepo = App::make(NotaRepository::class);
        $theme = $this->fakeNotaData($notaFields);
        return $notaRepo->create($theme);
    }

    /**
     * Get fake instance of Nota
     *
     * @param array $notaFields
     * @return Nota
     */
    public function fakeNota($notaFields = [])
    {
        return new Nota($this->fakeNotaData($notaFields));
    }

    /**
     * Get fake data of Nota
     *
     * @param array $postFields
     * @return array
     */
    public function fakeNotaData($notaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'titulo' => $fake->word,
            'descripcion' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $notaFields);
    }
}
