<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDetailsRequest extends FormRequest
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
            'name' => 'required | max:255',
            'email' => 'required|email',
            'country' => 'required|max:255',
            'phone' => 'required|numeric',
            'city' => 'required|max:255',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Name is too long',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'country.required' => 'Country is required',
            'country.max' => 'Country is too long',
            'phone.required' => 'Phone is required',
            'phone.max' => 'Phone is too long',
            'phone.numeric' => 'Phone is invalid',
            'city.required' => 'City is required',
            'city.max' => 'City is too long',
            'address.required' => 'Address is required',
        ];
    }
}
