<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
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
            "fechaCita"  =>    "required|after_or_equal:today",
        ];
    }

     public function messages()
    {
        return [
            
            'fechaCita.required' => 'La fecha de la cita es requerida',
            'fechaCita.after_or_equal' => 'La fecha de la cita es imposible. Esta fecha es del pasado',
        ];
    }
}
