<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reparacion
 * @package App\Models
 * @version June 3, 2018, 9:36 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection articuloProveedor
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property integer cod_factura
 * @property integer articulo_id
 * @property integer cliente_id
 * @property integer user_id
 * @property decimal costo_reparacion
 * @property date fecha_ingreso
 * @property string estado
 * @property string tipo_garantia
 * @property date fecha_egreso
 * @property string descripcion
 * @property integer dias_garantia
 */
class Reparacion extends Model
{
    use SoftDeletes;

    public $table = 'reparaciones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at','fecha_ingreso','fecha_egreso'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cod_factura' => 'integer',
        'articulo_id' => 'integer',
        'cliente_id' => 'integer',
        'user_id' => 'integer',
        'fecha_ingreso' => 'datetime:d/m/Y',
        'estado' => 'string',
        'tipo_garantia' => 'string',
        'fecha_egreso' => 'datetime:d/m/Y',
        'dias_garantia' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cod_factura' => 'required|unique:reparaciones,cod_factura',
        'articulo_id' => 'required|exists:articulos,id',
        'cliente_id'  => 'required|exists:clientes,id'
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estados()
    {
        return $this->hasMany(EstadoReparacion::class);
    }
    public function detalles() 
    {
        return $this->hasMany(DetalleReparacion::class);
    }


    
}
