<?php

namespace App\Repositories;

use App\Models\Marca;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MarcaRepository
 * @package App\Repositories
 * @version May 20, 2018, 11:17 am CST
 *
 * @method Marca findWithoutFail($id, $columns = ['*'])
 * @method Marca find($id, $columns = ['*'])
 * @method Marca first($columns = ['*'])
*/
class MarcaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Marca::class;
    }
}
