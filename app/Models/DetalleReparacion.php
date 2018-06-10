<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetalleReparacion
 * @package App\Models
 * @version June 10, 2018, 11:26 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection articuloProveedor
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property integer articulo_id
 * @property integer reparacion_id
 * @property string origen
 * @property decimal precio_unitario
 * @property integer cantidad
 * @property decimal subtotal
 */
class DetalleReparacion extends Model
{
    use SoftDeletes;

    public $table = 'detalle_reparacion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'articulo_id',
        'reparacion_id',
        'origen',
        'precio_unitario',
        'cantidad',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'articulo_id' => 'integer',
        'reparacion_id' => 'integer',
        'origen' => 'string',
        'cantidad' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function articulo() {
        return $this->belongsTo(Articulo::class);
    }
    public function reparacion() {
        return $this->belongsTo(Reparacion::class);
    }

    
}
