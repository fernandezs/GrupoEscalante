<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Marca;

class UpdateMarcaRequest extends FormRequest
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
        $id = $this->marca;
        $rules = Marca::$rules;
        //$rules['campo'] = $rules['campo'] . ',campo,' . $id;

        return $rules;
    }
}
