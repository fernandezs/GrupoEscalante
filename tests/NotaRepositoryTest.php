<?php

use App\Models\Nota;
use App\Repositories\NotaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotaRepositoryTest extends TestCase
{
    use MakeNotaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NotaRepository
     */
    protected $notaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->notaRepo = App::make(NotaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateNota()
    {
        $nota = $this->fakeNotaData();
        $createdNota = $this->notaRepo->create($nota);
        $createdNota = $createdNota->toArray();
        $this->assertArrayHasKey('id', $createdNota);
        $this->assertNotNull($createdNota['id'], 'Created Nota must have id specified');
        $this->assertNotNull(Nota::find($createdNota['id']), 'Nota with given id must be in DB');
        $this->assertModelData($nota, $createdNota);
    }

    /**
     * @test read
     */
    public function testReadNota()
    {
        $nota = $this->makeNota();
        $dbNota = $this->notaRepo->find($nota->id);
        $dbNota = $dbNota->toArray();
        $this->assertModelData($nota->toArray(), $dbNota);
    }

    /**
     * @test update
     */
    public function testUpdateNota()
    {
        $nota = $this->makeNota();
        $fakeNota = $this->fakeNotaData();
        $updatedNota = $this->notaRepo->update($fakeNota, $nota->id);
        $this->assertModelData($fakeNota, $updatedNota->toArray());
        $dbNota = $this->notaRepo->find($nota->id);
        $this->assertModelData($fakeNota, $dbNota->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteNota()
    {
        $nota = $this->makeNota();
        $resp = $this->notaRepo->delete($nota->id);
        $this->assertTrue($resp);
        $this->assertNull(Nota::find($nota->id), 'Nota should not exist in DB');
    }
}
