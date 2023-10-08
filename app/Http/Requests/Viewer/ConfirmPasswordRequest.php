<?php

namespace App\Http\Requests\Viewer;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmPasswordRequest extends FormRequest
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
            'old_password'=> [
                'required'
            ],
            'password'=> [
                'required',
                'confirmed'
            ]
        ];
    }

    public function messages()
    {
        return [
            'password.confirmed'=> "Mật khẩu xác nhận không khớp"
        ];
    }
}
