<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Reparacion;

class UpdateReparacionRequest extends FormRequest
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
        $id = $this->reparacion;
        dd($id);
        $rules = Reparacion::$rules;
        $rules['cod_factura'] = $rules['cod_factura'] .','. $id;

        return $rules;
    }
}
