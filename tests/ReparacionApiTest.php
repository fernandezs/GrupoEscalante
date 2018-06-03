<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReparacionApiTest extends TestCase
{
    use MakeReparacionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateReparacion()
    {
        $reparacion = $this->fakeReparacionData();
        $this->json('POST', '/api/v1/reparaciones', $reparacion);

        $this->assertApiResponse($reparacion);
    }

    /**
     * @test
     */
    public function testReadReparacion()
    {
        $reparacion = $this->makeReparacion();
        $this->json('GET', '/api/v1/reparaciones/'.$reparacion->id);

        $this->assertApiResponse($reparacion->toArray());
    }

    /**
     * @test
     */
    public function testUpdateReparacion()
    {
        $reparacion = $this->makeReparacion();
        $editedReparacion = $this->fakeReparacionData();

        $this->json('PUT', '/api/v1/reparaciones/'.$reparacion->id, $editedReparacion);

        $this->assertApiResponse($editedReparacion);
    }

    /**
     * @test
     */
    public function testDeleteReparacion()
    {
        $reparacion = $this->makeReparacion();
        $this->json('DELETE', '/api/v1/reparaciones/'.$reparacion->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/reparaciones/'.$reparacion->id);

        $this->assertResponseStatus(404);
    }
}
