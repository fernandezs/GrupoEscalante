<?php

namespace App\Repositories;

use App\Models\Estado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoRepository
 * @package App\Repositories
 * @version June 3, 2018, 9:36 am CST
 *
 * @method Estado findWithoutFail($id, $columns = ['*'])
 * @method Estado find($id, $columns = ['*'])
 * @method Estado first($columns = ['*'])
*/
class EstadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estado::class;
    }
}
