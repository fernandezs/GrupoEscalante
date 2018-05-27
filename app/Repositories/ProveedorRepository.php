<?php

namespace App\Repositories;

use App\Models\Proveedor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProveedorRepository
 * @package App\Repositories
 * @version May 20, 2018, 11:32 am CST
 *
 * @method Proveedor findWithoutFail($id, $columns = ['*'])
 * @method Proveedor find($id, $columns = ['*'])
 * @method Proveedor first($columns = ['*'])
*/
class ProveedorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nombre_contacto',
        'telefono',
        'pagina_web',
        'email',
        'domicilio',
        'cod_postal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Proveedor::class;
    }
}
