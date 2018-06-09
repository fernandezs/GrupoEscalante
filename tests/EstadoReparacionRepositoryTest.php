<?php

use App\Models\EstadoReparacion;
use App\Repositories\EstadoReparacionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadoReparacionRepositoryTest extends TestCase
{
    use MakeEstadoReparacionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EstadoReparacionRepository
     */
    protected $estadoReparacionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->estadoReparacionRepo = App::make(EstadoReparacionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEstadoReparacion()
    {
        $estadoReparacion = $this->fakeEstadoReparacionData();
        $createdEstadoReparacion = $this->estadoReparacionRepo->create($estadoReparacion);
        $createdEstadoReparacion = $createdEstadoReparacion->toArray();
        $this->assertArrayHasKey('id', $createdEstadoReparacion);
        $this->assertNotNull($createdEstadoReparacion['id'], 'Created EstadoReparacion must have id specified');
        $this->assertNotNull(EstadoReparacion::find($createdEstadoReparacion['id']), 'EstadoReparacion with given id must be in DB');
        $this->assertModelData($estadoReparacion, $createdEstadoReparacion);
    }

    /**
     * @test read
     */
    public function testReadEstadoReparacion()
    {
        $estadoReparacion = $this->makeEstadoReparacion();
        $dbEstadoReparacion = $this->estadoReparacionRepo->find($estadoReparacion->id);
        $dbEstadoReparacion = $dbEstadoReparacion->toArray();
        $this->assertModelData($estadoReparacion->toArray(), $dbEstadoReparacion);
    }

    /**
     * @test update
     */
    public function testUpdateEstadoReparacion()
    {
        $estadoReparacion = $this->makeEstadoReparacion();
        $fakeEstadoReparacion = $this->fakeEstadoReparacionData();
        $updatedEstadoReparacion = $this->estadoReparacionRepo->update($fakeEstadoReparacion, $estadoReparacion->id);
        $this->assertModelData($fakeEstadoReparacion, $updatedEstadoReparacion->toArray());
        $dbEstadoReparacion = $this->estadoReparacionRepo->find($estadoReparacion->id);
        $this->assertModelData($fakeEstadoReparacion, $dbEstadoReparacion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEstadoReparacion()
    {
        $estadoReparacion = $this->makeEstadoReparacion();
        $resp = $this->estadoReparacionRepo->delete($estadoReparacion->id);
        $this->assertTrue($resp);
        $this->assertNull(EstadoReparacion::find($estadoReparacion->id), 'EstadoReparacion should not exist in DB');
    }
}
