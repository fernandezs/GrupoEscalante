<?php

namespace App\Repositories;

use App\Models\Reparacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReparacionRepository
 * @package App\Repositories
 * @version June 3, 2018, 9:36 am CST
 *
 * @method Reparacion findWithoutFail($id, $columns = ['*'])
 * @method Reparacion find($id, $columns = ['*'])
 * @method Reparacion first($columns = ['*'])
*/
class ReparacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cod_factura',
        'articulo_id',
        'cliente_id',
        'user_id',
        'costo_reparacion',
        'fecha_ingreso',
        'estado',
        'tipo_garantia',
        'fecha_egreso',
        'descripcion',
        'dias_garantia'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Reparacion::class;
    }
    public function withTrashed()
    {
        return $this->model->withTrashed();
    }
}
