<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBooksRequest extends FormRequest
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
          'name' => 'required',
          'author' => 'required',
          'year' => 'required|integer|digits:4',
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
            'name.required' => 'name is required',
            'author.required' => 'author is required',
            'year.required' => 'year is required',
        ];
    }
}
