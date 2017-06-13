<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoaiTinRequest extends Request
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
            'TheLoai' => 'required',
            'Ten'     => 'required|unique:LoaiTin,Ten|min:2|max:100'
        ];
    }

    public function messages()
    {
        return [
            'Ten.required'     => 'Bạn chưa nhập tên loại tin',
            'Ten.unique'       => 'Tên loại tin đã tồn tại',
            'Ten.min'          => 'Tên phải > 1 kí tự',
            'Ten.max'          => 'Tên phải < 100 kí tự',
            'TheLoai.required' => 'Bạn chưa chọn thể loại',
        ];
    }
}
