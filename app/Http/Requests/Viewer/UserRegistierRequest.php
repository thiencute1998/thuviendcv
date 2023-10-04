<?php

namespace App\Http\Requests\Viewer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRegistierRequest extends FormRequest
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
            'name'=> 'required',
            'email'=> [
                'required',
                'email',
                Rule::unique('users')->ignore($this->email),
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
            'email.unique'=> "Email đã tồn tại",
            'password.confirmed'=> "Mật khẩu xác nhận không khớp"
        ];
    }
}
