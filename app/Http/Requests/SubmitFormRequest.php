<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'country' => 'required',
            'prefix' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
        ];
    }
}
