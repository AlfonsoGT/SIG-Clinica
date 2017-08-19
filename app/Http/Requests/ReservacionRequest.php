<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservacionRequest extends FormRequest
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
            "fechaPago"  =>    "required|after_or_equal:today",
        ];
    }

     public function messages()
    {
        return [
            
            'fechaPago.required' => 'La fecha de pago es requerida',
            'fechaPago.after_or_equal' => 'La fecha de pago es imposible. Esta fecha es del pasado',
        ];
    }
}