<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetalleDeuda
 * @package App\Models
 * @version May 26, 2018, 7:05 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection articuloProveedor
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property integer deuda_id
 * @property integer articulo_id
 * @property decimal precio_costo
 * @property decimal precio_venta
 * @property integer cantidad
 * @property integer descuento
 * @property decimal subtotal
 */
class DetalleDeuda extends Model
{
    use SoftDeletes;

    public $table = 'detalle_deuda';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'deuda_id',
        'articulo_id',
        'precio_costo',
        'precio_venta',
        'cantidad',
        'descuento',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'deuda_id' => 'integer',
        'articulo_id' => 'integer',
        'cantidad' => 'integer',
        'descuento' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'deuda_id' => 'required',
        'articulo_id' => 'required',
        'cantidad' => 'required'
    ];

    public function deuda()
    {
        return $this->belongsTo(Deuda::class);
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }

    
}
