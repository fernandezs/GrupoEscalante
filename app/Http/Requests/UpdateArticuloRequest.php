<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Articulo;

class UpdateArticuloRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        $id = $this->articulo;
        $rules = Articulo::$rules;
        $rules['cod_articulo'] = $rules['cod_articulo'] .','. $id;
        return $rules;
    }
}
