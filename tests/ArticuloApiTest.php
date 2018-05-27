<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticuloApiTest extends TestCase
{
    use MakeArticuloTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateArticulo()
    {
        $articulo = $this->fakeArticuloData();
        $this->json('POST', '/api/v1/articulos', $articulo);

        $this->assertApiResponse($articulo);
    }

    /**
     * @test
     */
    public function testReadArticulo()
    {
        $articulo = $this->makeArticulo();
        $this->json('GET', '/api/v1/articulos/'.$articulo->id);

        $this->assertApiResponse($articulo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateArticulo()
    {
        $articulo = $this->makeArticulo();
        $editedArticulo = $this->fakeArticuloData();

        $this->json('PUT', '/api/v1/articulos/'.$articulo->id, $editedArticulo);

        $this->assertApiResponse($editedArticulo);
    }

    /**
     * @test
     */
    public function testDeleteArticulo()
    {
        $articulo = $this->makeArticulo();
        $this->json('DELETE', '/api/v1/articulos/'.$articulo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/articulos/'.$articulo->id);

        $this->assertResponseStatus(404);
    }
}
