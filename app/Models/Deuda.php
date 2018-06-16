<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Deuda
 * @package App\Models
 * @version May 26, 2018, 6:50 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection articuloProveedor
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property integer user_id
 * @property integer cliente_id
 * @property string detalle
 * @property string estado
 * @property decimal importe_total
 * @property date fecha_cobro
 * @property integer interes
 */
class Deuda extends Model
{
    use SoftDeletes;

    public $table = 'deudas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at','fecha_cobro'];


    public $fillable = [
        'user_id',
        'cliente_id',
        'detalle',
        'estado',
        'importe_total',
        'fecha_cobro',
        'interes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'cliente_id' => 'integer',
        'detalle' => 'string',
        'estado' => 'string',
        'fecha_cobro' => 'date',
        'interes' => 'decimal',
        'created_at' => 'date:d/m/Y'
    ];




    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cliente_id' => 'required|exists:clientes,id'
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleDeuda::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    
}
