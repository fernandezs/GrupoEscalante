<?php

use App\Models\Reparacion;
use App\Repositories\ReparacionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReparacionRepositoryTest extends TestCase
{
    use MakeReparacionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReparacionRepository
     */
    protected $reparacionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->reparacionRepo = App::make(ReparacionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateReparacion()
    {
        $reparacion = $this->fakeReparacionData();
        $createdReparacion = $this->reparacionRepo->create($reparacion);
        $createdReparacion = $createdReparacion->toArray();
        $this->assertArrayHasKey('id', $createdReparacion);
        $this->assertNotNull($createdReparacion['id'], 'Created Reparacion must have id specified');
        $this->assertNotNull(Reparacion::find($createdReparacion['id']), 'Reparacion with given id must be in DB');
        $this->assertModelData($reparacion, $createdReparacion);
    }

    /**
     * @test read
     */
    public function testReadReparacion()
    {
        $reparacion = $this->makeReparacion();
        $dbReparacion = $this->reparacionRepo->find($reparacion->id);
        $dbReparacion = $dbReparacion->toArray();
        $this->assertModelData($reparacion->toArray(), $dbReparacion);
    }

    /**
     * @test update
     */
    public function testUpdateReparacion()
    {
        $reparacion = $this->makeReparacion();
        $fakeReparacion = $this->fakeReparacionData();
        $updatedReparacion = $this->reparacionRepo->update($fakeReparacion, $reparacion->id);
        $this->assertModelData($fakeReparacion, $updatedReparacion->toArray());
        $dbReparacion = $this->reparacionRepo->find($reparacion->id);
        $this->assertModelData($fakeReparacion, $dbReparacion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteReparacion()
    {
        $reparacion = $this->makeReparacion();
        $resp = $this->reparacionRepo->delete($reparacion->id);
        $this->assertTrue($resp);
        $this->assertNull(Reparacion::find($reparacion->id), 'Reparacion should not exist in DB');
    }
}
