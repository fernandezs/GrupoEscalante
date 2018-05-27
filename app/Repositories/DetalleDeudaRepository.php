<?php

namespace App\Repositories;

use App\Models\DetalleDeuda;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetalleDeudaRepository
 * @package App\Repositories
 * @version May 26, 2018, 7:05 am CST
 *
 * @method DetalleDeuda findWithoutFail($id, $columns = ['*'])
 * @method DetalleDeuda find($id, $columns = ['*'])
 * @method DetalleDeuda first($columns = ['*'])
*/
class DetalleDeudaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'deuda_id',
        'articulo_id',
        'precio_costo',
        'precio_venta',
        'cantidad',
        'descuento',
        'subtotal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetalleDeuda::class;
    }
}
