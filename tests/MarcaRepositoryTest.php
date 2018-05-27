<?php

use App\Models\Marca;
use App\Repositories\MarcaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MarcaRepositoryTest extends TestCase
{
    use MakeMarcaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MarcaRepository
     */
    protected $marcaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->marcaRepo = App::make(MarcaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMarca()
    {
        $marca = $this->fakeMarcaData();
        $createdMarca = $this->marcaRepo->create($marca);
        $createdMarca = $createdMarca->toArray();
        $this->assertArrayHasKey('id', $createdMarca);
        $this->assertNotNull($createdMarca['id'], 'Created Marca must have id specified');
        $this->assertNotNull(Marca::find($createdMarca['id']), 'Marca with given id must be in DB');
        $this->assertModelData($marca, $createdMarca);
    }

    /**
     * @test read
     */
    public function testReadMarca()
    {
        $marca = $this->makeMarca();
        $dbMarca = $this->marcaRepo->find($marca->id);
        $dbMarca = $dbMarca->toArray();
        $this->assertModelData($marca->toArray(), $dbMarca);
    }

    /**
     * @test update
     */
    public function testUpdateMarca()
    {
        $marca = $this->makeMarca();
        $fakeMarca = $this->fakeMarcaData();
        $updatedMarca = $this->marcaRepo->update($fakeMarca, $marca->id);
        $this->assertModelData($fakeMarca, $updatedMarca->toArray());
        $dbMarca = $this->marcaRepo->find($marca->id);
        $this->assertModelData($fakeMarca, $dbMarca->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMarca()
    {
        $marca = $this->makeMarca();
        $resp = $this->marcaRepo->delete($marca->id);
        $this->assertTrue($resp);
        $this->assertNull(Marca::find($marca->id), 'Marca should not exist in DB');
    }
}
