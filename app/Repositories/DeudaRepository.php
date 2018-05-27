<?php

namespace App\Repositories;

use App\Models\Deuda;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DeudaRepository
 * @package App\Repositories
 * @version May 26, 2018, 6:50 am CST
 *
 * @method Deuda findWithoutFail($id, $columns = ['*'])
 * @method Deuda find($id, $columns = ['*'])
 * @method Deuda first($columns = ['*'])
*/
class DeudaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'cliente_id',
        'detalle',
        'estado',
        'importe_total',
        'fecha_cobro',
        'interes'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Deuda::class;
    }
}
