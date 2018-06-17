<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    public $table = 'catalogos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'proveedor_id',
        'name',
        'type',
        'url'
    ];

    public function proveedor()
    {
    	return $this->belongsTo(Proveedor::class);
    }
}
