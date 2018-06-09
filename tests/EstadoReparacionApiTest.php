<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadoReparacionApiTest extends TestCase
{
    use MakeEstadoReparacionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEstadoReparacion()
    {
        $estadoReparacion = $this->fakeEstadoReparacionData();
        $this->json('POST', '/api/v1/estadoReparacions', $estadoReparacion);

        $this->assertApiResponse($estadoReparacion);
    }

    /**
     * @test
     */
    public function testReadEstadoReparacion()
    {
        $estadoReparacion = $this->makeEstadoReparacion();
        $this->json('GET', '/api/v1/estadoReparacions/'.$estadoReparacion->id);

        $this->assertApiResponse($estadoReparacion->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEstadoReparacion()
    {
        $estadoReparacion = $this->makeEstadoReparacion();
        $editedEstadoReparacion = $this->fakeEstadoReparacionData();

        $this->json('PUT', '/api/v1/estadoReparacions/'.$estadoReparacion->id, $editedEstadoReparacion);

        $this->assertApiResponse($editedEstadoReparacion);
    }

    /**
     * @test
     */
    public function testDeleteEstadoReparacion()
    {
        $estadoReparacion = $this->makeEstadoReparacion();
        $this->json('DELETE', '/api/v1/estadoReparacions/'.$estadoReparacion->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/estadoReparacions/'.$estadoReparacion->id);

        $this->assertResponseStatus(404);
    }
}
