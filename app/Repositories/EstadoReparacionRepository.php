<?php

namespace App\Repositories;

use App\Models\EstadoReparacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoReparacionRepository
 * @package App\Repositories
 * @version June 6, 2018, 11:09 am CST
 *
 * @method EstadoReparacion findWithoutFail($id, $columns = ['*'])
 * @method EstadoReparacion find($id, $columns = ['*'])
 * @method EstadoReparacion first($columns = ['*'])
*/
class EstadoReparacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'reparacion_id',
        'estado_id',
        'user_id',
        'empleado_id',
        'fecha',
        'detalle'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EstadoReparacion::class;
    }
}
