<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|min:2|max:50'
            //
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'camp obligatoriu',
            'name.min' => 'minim 2 caractere',
            'name.max' => 'maxim 50 caratere',
        ];
    }
}
