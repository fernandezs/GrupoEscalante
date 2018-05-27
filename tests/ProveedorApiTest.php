<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProveedorApiTest extends TestCase
{
    use MakeProveedorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProveedor()
    {
        $proveedor = $this->fakeProveedorData();
        $this->json('POST', '/api/v1/proveedores', $proveedor);

        $this->assertApiResponse($proveedor);
    }

    /**
     * @test
     */
    public function testReadProveedor()
    {
        $proveedor = $this->makeProveedor();
        $this->json('GET', '/api/v1/proveedores/'.$proveedor->id);

        $this->assertApiResponse($proveedor->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProveedor()
    {
        $proveedor = $this->makeProveedor();
        $editedProveedor = $this->fakeProveedorData();

        $this->json('PUT', '/api/v1/proveedores/'.$proveedor->id, $editedProveedor);

        $this->assertApiResponse($editedProveedor);
    }

    /**
     * @test
     */
    public function testDeleteProveedor()
    {
        $proveedor = $this->makeProveedor();
        $this->json('DELETE', '/api/v1/proveedores/'.$proveedor->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/proveedores/'.$proveedor->id);

        $this->assertResponseStatus(404);
    }
}
