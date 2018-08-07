<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentPostRequest extends FormRequest
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
            'lastname' => 'bail|required|max:50'
        ];
    }

    public function messages(){
        return [
            'lastname.required' => 'Last name is required.',
            'lastname.max' => 'Last name should not exceed 50 characters.'
        ];
    }
}
