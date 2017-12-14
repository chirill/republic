<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            //
            'name' => 'required',
            'email' => 'required',
            'location_id' => 'required',
            'status' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Completati campul cu nume',
            'email.required' => '',
            'location_id.required' => '',
            'status.required' => '',
        ];
    }
}
