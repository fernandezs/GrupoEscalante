<?php

namespace App\Repositories;

use App\Models\Articulo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ArticuloRepository
 * @package App\Repositories
 * @version May 20, 2018, 12:18 pm CST
 *
 * @method Articulo findWithoutFail($id, $columns = ['*'])
 * @method Articulo find($id, $columns = ['*'])
 * @method Articulo first($columns = ['*'])
*/
class ArticuloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cod_articulo',
        'categoria_id',
        'nombre',
        'descripcion',
        'marca_id',
        'precio_costo',
        'precio_venta',
        'cantidad',
        'cantidad_minima',
        'foto',
        'nro_cabezal',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Articulo::class;
    }
}
