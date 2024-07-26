<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlineUsersRegister extends FormRequest
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
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'city.required' => 'City is required',
            'country.required' => 'Country is required',
            'address.required' => 'Address is required',
            'password.required' => 'Password is required',
            'phone.required' => 'Phone is required',
        ];
    }
}
