<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstadoReparacion
 * @package App\Models
 * @version June 6, 2018, 11:09 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection articuloProveedor
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property integer reparacion_id
 * @property integer estado_id
 * @property integer user_id
 * @property integer empleado_id
 * @property date fecha
 * @property string detalle
 */
class EstadoReparacion extends Model
{
    use SoftDeletes;

    public $table = 'estado_reparacion';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'reparacion_id',
        'estado_id',
        'user_id',
        'empleado_id',
        'fecha',
        'detalle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'reparacion_id' => 'integer',
        'estado_id' => 'integer',
        'user_id' => 'integer',
        'empleado_id' => 'integer',
        'fecha' => 'date',
        'detalle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function reparacion()
    {
        return $this->belongsTo(Reparacion::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
