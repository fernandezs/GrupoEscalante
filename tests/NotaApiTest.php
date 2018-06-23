<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotaApiTest extends TestCase
{
    use MakeNotaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateNota()
    {
        $nota = $this->fakeNotaData();
        $this->json('POST', '/api/v1/notas', $nota);

        $this->assertApiResponse($nota);
    }

    /**
     * @test
     */
    public function testReadNota()
    {
        $nota = $this->makeNota();
        $this->json('GET', '/api/v1/notas/'.$nota->id);

        $this->assertApiResponse($nota->toArray());
    }

    /**
     * @test
     */
    public function testUpdateNota()
    {
        $nota = $this->makeNota();
        $editedNota = $this->fakeNotaData();

        $this->json('PUT', '/api/v1/notas/'.$nota->id, $editedNota);

        $this->assertApiResponse($editedNota);
    }

    /**
     * @test
     */
    public function testDeleteNota()
    {
        $nota = $this->makeNota();
        $this->json('DELETE', '/api/v1/notas/'.$nota->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/notas/'.$nota->id);

        $this->assertResponseStatus(404);
    }
}
