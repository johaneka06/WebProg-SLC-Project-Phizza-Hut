<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
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
            'username' => 'required',
            'email' => 'required|email|unique',
            'password' => 'required|min:6',
            'confirm' => 'required|min:6|same:password',
            'address' => 'required',
            'phone' => 'required|numeric',
            'gender' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'confirm' => 'Confirmation Password',
            'address' => 'Address',
            'phone' => 'Phone Number',
            'gender' => 'Gender'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required'
        ];
    }
}
