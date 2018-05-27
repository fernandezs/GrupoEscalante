<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 * @package App\Models
 * @version May 20, 2018, 12:18 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property integer num_cliente
 * @property string nombre
 * @property string telefono
 * @property string email
 * @property string doc_tipo
 * @property string doc_numero
 * @property string tipo
 * @property string direccion
 */
class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'clientes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'num_cliente',
        'nombre',
        'telefono',
        'email',
        'doc_tipo',
        'doc_numero',
        'tipo',
        'direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'num_cliente' => 'integer',
        'nombre' => 'string',
        'telefono' => 'string',
        'email' => 'string',
        'doc_tipo' => 'string',
        'doc_numero' => 'string',
        'tipo' => 'string',
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'num_cliente' => 'required|unique:clientes,num_cliente',
        'nombre' => 'required'  
    ];

    
}
