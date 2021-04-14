<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderAsignedRequest extends FormRequest
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
            'booking_number' => 'required|alpha_num|unique:orders,booking_number',
            'equipment'=> 'required|alpha_num',
            'unit_number'=> 'required',
            'origin_ramp'=> 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ,-_ ]+$/',
            'destination_ramp'=> 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ,-_ ]+$/',
            'consignee_city'=> 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ,-_ ]+$/',
            'consignee_state'=> 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ,-_ ]+$/',
            'ramp'=> 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ,-_ ]+$/',
            'rail_route'=> 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ,-_ ]+$/',
            'mil_reference'=> 'required',
            'vessel'=> 'required|alpha',
            'voyage'=> 'required|numeric',
            'work_price'=> 'required|numeric',
            'driver_paid'=> 'required|numeric',
            'fuel'=> 'required|numeric',
            'chassis'=> 'unique:orders,chassis',
            'status'=> 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/',
            'driver'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'booking_number.required' => 'El campo booking number es requerido',
            'booking_number.numeric' => 'El campo booking number solo acepta numeros positivos',
            'booking_number.unique' => 'El campo booking number ya ha sido registrado, intente con uno diferente',
            'equipment.required' => 'El campo equipment es requerido',
            'equipment.alpha_num' => 'El campo equipment solo acepta letras y/o números positivos sin separaciones',
            'unit_number.required' => 'El campo unit number es requerido',
            'unit_number.regex' => 'El campo unit number solo permite letras, numeros y guiones medios',
            'origin_ramp.required' => 'El campo origin ramp es requerido',
            'origin_ramp.regex' => 'El campo origin ramp solo acepta letras, guiones y comas',
            'destination_ramp.required' => 'El campo destination ramp es requerido',
            'destination_ramp.regex' => 'El campo destination ramp solo acepta letras, guiones y comas',
            'consigenee_city.required' => 'El campo consigenee city es requerido',
            'consigenee_city.regex' => 'El campo consigenee city solo acepta letras, guiones y comas',
            'consigenee_state.required' => 'El campo consigenee state es requerido',
            'consigenee_state.regex' => 'El campo consigenee state solo acepta letras, guiones y comas',
            'ramp.required' => 'El campo ramp es requerido',
            'ramp.regex' => 'El campo ramp solo acepta letras, guiones y comas',
            'rail_route.required' => 'El campo rail route es requerido',
            'rail_route.regex' => 'El campo rail route solo acepta letras, guiones y comas',
            'chassis.alpha_num' => 'El campo chassis solo acepta letras y/o números positivos sin separaciones',
            'chassis.unique' => 'El campo chassis ya ha sido registrado, intente con uno diferente',
            'status.required' => 'El campo status es requerido',
            'status.regex' => 'El campo status solo acepta letras y permite espacios',
            'driver.required' => 'El campo driver es requerido',
            'mil_reference.required' => 'El campo MIL reference es requerido',
            'voyage.required' => 'El campo voyage es requerido',
            'voyage.numeric' => 'El campo voyage solo acepta valores numericos',
            'work_price.required' => 'El campo work price es requerido',
            'work_price.numeric' => 'El campo work price solo acepta valores numericos',
            'driver_paid.required' => 'El campo driver paid es requerido',
            'driver_paid.numeric' => 'El campo driver paid solo acepta valores numericos',
            'fuel.required' => 'El campo fuel es requerido',
            'fuel.numeric' => 'El campo fuel solo acepta valores numericos',
            'vessel.required' => 'El campo vessel es requerido',
            'vessel.alpha' => 'El campo vessel solo acepta valores alfabeticos',


        ];
    }
}
