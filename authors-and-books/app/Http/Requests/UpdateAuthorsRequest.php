<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorsRequest extends FormRequest
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
        'firstName' => 'required',
        'lastName' => 'required',
  ];
    }

    /**
     * Return customized validation messages
     *
     * @return array
     */
    public function messages()
    {
      return [
        'firstName.required' => 'first name is required',
        'lastName.required' => 'last name is required'
      ];
    }
}
