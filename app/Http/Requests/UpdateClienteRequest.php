<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cliente;

class UpdateClienteRequest extends FormRequest
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
        $id = $this->cliente;
        $rules = Cliente::$rules;
        $rules['num_cliente'] = $rules['num_cliente'] .','. $id;
        $rules['telefono'] = $rules['telefono'] .','. $id;
        return $rules;
    }
}
