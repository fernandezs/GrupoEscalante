<?php

namespace App\Repositories;

use App\Models\DetalleReparacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetalleReparacionRepository
 * @package App\Repositories
 * @version June 10, 2018, 11:26 am CST
 *
 * @method DetalleReparacion findWithoutFail($id, $columns = ['*'])
 * @method DetalleReparacion find($id, $columns = ['*'])
 * @method DetalleReparacion first($columns = ['*'])
*/
class DetalleReparacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'articulo_id',
        'reparacion_id',
        'origen',
        'precio_unitario',
        'cantidad',
        'subtotal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetalleReparacion::class;
    }
}
