<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdate extends FormRequest
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
            'firstname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'phoneno' => 'max:12|unique:users,phoneno,' . auth()->user()->id,
            'billing_address1' => 'required|string|min:10',
            'billing_state1' => 'required|string|max:150',
            'billing_city1' => 'required|string|max:150',
            'billing_country1' => 'string|max:150',
            'billing_postal_code1' => 'string|max:150',
            'billing_address2' => 'string|min:10',
            'billing_state2' => 'string|max:150',
            'billing_city2' => 'string|max:150',
            'billing_country2' => 'string|max:150',
            'billing_postal_code2' => 'string|max:150',

            'shipping_address1' => 'required|string|min:10',
            'shipping_state1' => 'required|string|max:150',
            'shipping_city1' => 'required|string|max:150',
            'shipping_country1' => 'string|max:150',
            'shipping_postal_code1' => 'string|max:150',
            'shipping_address2' => 'string|min:10',
            'shipping_state2' => 'string|max:150',
            'shipping_city2' => 'string|max:150',
            'shipping_country2' => 'string|max:150',
            'shipping_postal_code2' => 'string|max:150',
        ];
    }
}
