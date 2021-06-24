<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $rules =  [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phoneno' => 'required|max:12|unique:users',
            'password' => 'required|min:6',
            'confirmPassword' => 'same:password',
            "role" => "required|string|in:customer,vendor",
            "vendor_no" => "string|max:255",
            "newsletter" => "required|boolean"
        ];
        if ($this->role === "vendor") {
            $rules["store_name"] = 'required|string|max:255';
        }
        return $rules;
    }
}
