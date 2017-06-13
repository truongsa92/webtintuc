<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TheLoaiRequest extends Request
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
            'ten' => 'required|unique:TheLoai,Ten|min:3|max:100'
        ];
    }

    public function messages()
    {
        return [
            'ten.required' => 'Bạn chưa nhập tên thể loại',
            'ten.unique'   => 'Bạn nhập trùng tên thể loại',
            'ten.min'      => 'Tên thể loại phải >= 3 kí tự',
            'ten.max'      => 'Tên thể loại phải <= 100 kí tự'
        ];
    }
}
