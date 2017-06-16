<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserLoginRequest extends Request
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
            'email'          => 'required|min:3',
            'password'      => 'required|min:6',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'email.required'         => 'Bạn chưa nhập email',
    //         'email.min'              => 'Email quá ngắn',
    //         'password.required'      => 'Bạn chưa nhập mật khẩu',
    //         'password.min'           => 'Mật khẩu phải >= 6 kí tự',
    //     ];
    // }
}
