<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Articulo
 * @package App\Models
 * @version May 20, 2018, 12:18 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property integer cod_articulo
 * @property integer categoria_id
 * @property string nombre
 * @property string descripcion
 * @property integer marca_id
 * @property decimal precio_costo
 * @property decimal precio_venta
 * @property integer cantidad
 * @property integer cantidad_minima
 * @property string foto
 * @property integer nro_cabezal
 * @property string estado
 */
class Articulo extends Model
{
    use SoftDeletes;

    public $table = 'articulos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cod_articulo' => 'integer',
        'categoria_id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string',
        'marca_id' => 'integer',
        'cantidad' => 'integer',
        'cantidad_minima' => 'integer',
        'foto' => 'string',
        'nro_cabezal' => 'integer',
        'estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cod_articulo' => 'required|unique:articulos,cod_articulo',
        'categoria_id' => 'required|exists:categorias,id',
        'nombre' => 'required|min:4',
        'marca_id' => 'required|exists:marcas,id',
        'cantidad' => 'required',
        'cantidad_minima' => 'required',
        'precio_costo' => 'required',
        'precio_venta' => 'required',
        'estado' => 'required',
        'foto' => 'image'
        
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class);
    }

    public function reparaciones()
    {
        return $this->hasMany(Reparacion::class);
    }
    

    
}
