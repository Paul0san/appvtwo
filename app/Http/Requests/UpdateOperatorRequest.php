<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOperatorRequest extends FormRequest
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
            'name'=>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/|min:2|max:45',
            'last_name'=>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/|min:2|max:45',
            'phone'=>'required|regex:/^[0-9]+$/|min:7|max:20|unique:users,phone,'. $this->route('operadore'),
            'email'=>'required|email|unique:users,email,'. $this->route('operadore')
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'phone.required' => 'El télefono es requerido',
            'email.required' => 'El email es requerido',
            'name.regex' => 'El nombre solo puede contener letras, espacios',
            'last_name.regex' => 'El apellido solo puede contener letras, espacios',
            'phone.regex' => 'Ingresa un número de télefono válido',
            'email.email' => 'Ingresa un email válido',
            'name.min' => 'El nombre debe tener mínimo 2 letras',
            'name.max' => 'El nombre debe tener máximo 45 caracteres',
            'last_name.min' => 'El apellido debe tener mínimo 2 letras',
            'last_name.max' => 'El apellido debe tener máximo 45 caracteres',
            'phone.min' => 'El télefono debe tener mínimo 7 números',
            'phone.max' => 'El télefono debe tener máximo 45 caracteres',
            'phone.unique' => 'El télefono ya está registrado, intenta con otro',
            'email.unique' => 'El email ya está registrado, intenta con otro',

        ];
    }
}
