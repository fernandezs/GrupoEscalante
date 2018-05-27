<?php

use App\Models\Proveedor;
use App\Repositories\ProveedorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProveedorRepositoryTest extends TestCase
{
    use MakeProveedorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProveedorRepository
     */
    protected $proveedorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->proveedorRepo = App::make(ProveedorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProveedor()
    {
        $proveedor = $this->fakeProveedorData();
        $createdProveedor = $this->proveedorRepo->create($proveedor);
        $createdProveedor = $createdProveedor->toArray();
        $this->assertArrayHasKey('id', $createdProveedor);
        $this->assertNotNull($createdProveedor['id'], 'Created Proveedor must have id specified');
        $this->assertNotNull(Proveedor::find($createdProveedor['id']), 'Proveedor with given id must be in DB');
        $this->assertModelData($proveedor, $createdProveedor);
    }

    /**
     * @test read
     */
    public function testReadProveedor()
    {
        $proveedor = $this->makeProveedor();
        $dbProveedor = $this->proveedorRepo->find($proveedor->id);
        $dbProveedor = $dbProveedor->toArray();
        $this->assertModelData($proveedor->toArray(), $dbProveedor);
    }

    /**
     * @test update
     */
    public function testUpdateProveedor()
    {
        $proveedor = $this->makeProveedor();
        $fakeProveedor = $this->fakeProveedorData();
        $updatedProveedor = $this->proveedorRepo->update($fakeProveedor, $proveedor->id);
        $this->assertModelData($fakeProveedor, $updatedProveedor->toArray());
        $dbProveedor = $this->proveedorRepo->find($proveedor->id);
        $this->assertModelData($fakeProveedor, $dbProveedor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProveedor()
    {
        $proveedor = $this->makeProveedor();
        $resp = $this->proveedorRepo->delete($proveedor->id);
        $this->assertTrue($resp);
        $this->assertNull(Proveedor::find($proveedor->id), 'Proveedor should not exist in DB');
    }
}
