<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetPhoneCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'country_code' => 'required',
        ];
    }
}
