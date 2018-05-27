<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MarcaApiTest extends TestCase
{
    use MakeMarcaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMarca()
    {
        $marca = $this->fakeMarcaData();
        $this->json('POST', '/api/v1/marcas', $marca);

        $this->assertApiResponse($marca);
    }

    /**
     * @test
     */
    public function testReadMarca()
    {
        $marca = $this->makeMarca();
        $this->json('GET', '/api/v1/marcas/'.$marca->id);

        $this->assertApiResponse($marca->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMarca()
    {
        $marca = $this->makeMarca();
        $editedMarca = $this->fakeMarcaData();

        $this->json('PUT', '/api/v1/marcas/'.$marca->id, $editedMarca);

        $this->assertApiResponse($editedMarca);
    }

    /**
     * @test
     */
    public function testDeleteMarca()
    {
        $marca = $this->makeMarca();
        $this->json('DELETE', '/api/v1/marcas/'.$marca->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/marcas/'.$marca->id);

        $this->assertResponseStatus(404);
    }
}
