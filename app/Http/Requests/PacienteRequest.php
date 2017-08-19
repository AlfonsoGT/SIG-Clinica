<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
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
    public function rules()
    {
        return [
            "fechaNacimiento"  =>    "required|before_or_equal:today",
        ];
    }

     public function messages()
    {
        return [
            
            'fechaNacimiento.required' => 'La fecha de nacimiento es requerida',
            'fechaNacimiento.before_or_equal' => 'La fecha de nacimiento es imposible. Esta fecha es del futuro',
        ];
    }
}
