<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
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
            'name' => 'required|max:20',
            'price' => 'required|numeric|min:10000',
            'desc' => 'required|min:20',
            'img' => 'required|mimes:jpeg,png,jpg'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Pizza Name',
            'price' => 'Pizza Price',
            'desc' => 'Pizza Description',
            'img' => 'Pizza Image'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'mimes' => ':attribute must be an image'
        ];
    }
}
