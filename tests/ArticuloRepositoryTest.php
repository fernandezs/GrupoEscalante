<?php

use App\Models\Articulo;
use App\Repositories\ArticuloRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticuloRepositoryTest extends TestCase
{
    use MakeArticuloTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ArticuloRepository
     */
    protected $articuloRepo;

    public function setUp()
    {
        parent::setUp();
        $this->articuloRepo = App::make(ArticuloRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateArticulo()
    {
        $articulo = $this->fakeArticuloData();
        $createdArticulo = $this->articuloRepo->create($articulo);
        $createdArticulo = $createdArticulo->toArray();
        $this->assertArrayHasKey('id', $createdArticulo);
        $this->assertNotNull($createdArticulo['id'], 'Created Articulo must have id specified');
        $this->assertNotNull(Articulo::find($createdArticulo['id']), 'Articulo with given id must be in DB');
        $this->assertModelData($articulo, $createdArticulo);
    }

    /**
     * @test read
     */
    public function testReadArticulo()
    {
        $articulo = $this->makeArticulo();
        $dbArticulo = $this->articuloRepo->find($articulo->id);
        $dbArticulo = $dbArticulo->toArray();
        $this->assertModelData($articulo->toArray(), $dbArticulo);
    }

    /**
     * @test update
     */
    public function testUpdateArticulo()
    {
        $articulo = $this->makeArticulo();
        $fakeArticulo = $this->fakeArticuloData();
        $updatedArticulo = $this->articuloRepo->update($fakeArticulo, $articulo->id);
        $this->assertModelData($fakeArticulo, $updatedArticulo->toArray());
        $dbArticulo = $this->articuloRepo->find($articulo->id);
        $this->assertModelData($fakeArticulo, $dbArticulo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteArticulo()
    {
        $articulo = $this->makeArticulo();
        $resp = $this->articuloRepo->delete($articulo->id);
        $this->assertTrue($resp);
        $this->assertNull(Articulo::find($articulo->id), 'Articulo should not exist in DB');
    }
}
