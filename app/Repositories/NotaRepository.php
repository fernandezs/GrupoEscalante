<?php

namespace App\Repositories;

use App\Models\Nota;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NotaRepository
 * @package App\Repositories
 * @version June 23, 2018, 11:30 am CST
 *
 * @method Nota findWithoutFail($id, $columns = ['*'])
 * @method Nota find($id, $columns = ['*'])
 * @method Nota first($columns = ['*'])
*/
class NotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nota::class;
    }
}
