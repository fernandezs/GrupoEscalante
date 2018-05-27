<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Empleado
 * @package App\Models
 * @version May 20, 2018, 12:17 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection optionUser
 * @property \Illuminate\Database\Eloquent\Collection rolUser
 * @property string nombre
 * @property string|\Carbon\Carbon fecha_ingreso
 */
class Empleado extends Model
{
    use SoftDeletes;

    public $table = 'empleados';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at', 'fecha_ingreso'];


    public $fillable = [
        'nombre',
        'fecha_ingreso'
    ];

    /*
    public function setFechaIngresoAttribute( $value){
        $this->attributes['fecha_ingreso'] = date("y-m-d", strtotime($value));
    }*/

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];
/*
    public function getFechaIngresoAttribute($value)
    {
        return $value->format('d m Y');
    }
*/


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'fecha_ingreso' => 'required|date'
    ];

    
}
