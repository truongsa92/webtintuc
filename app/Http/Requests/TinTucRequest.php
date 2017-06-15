<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TinTucRequest extends Request
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
           'LoaiTin' => 'required',
            'TieuDe'  => 'required|min:3|max:100',
            'TomTat'    => 'required',
            'NoiDung' => 'required',
            'HinhAnh'         => 'image',
            'NoiBat'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'LoaiTin.required' => 'Bạn chưa chọn loại tin',
            'TieuDe.required'  => 'Bạn chưa chọn tiêu đề',
            'TieuDe.min'             => 'Tiêu đề phải >= 3 kí tự',
            'TieuDe.max'             => 'Tiêu đề phải <= 100 kí tự',
            'TomTat.required'  => 'Bạn chưa nhập tóm tắt',
            'NoiDung.required'  => 'Bạn chưa nhập nội dung',
            'HinhAnh.image'    => 'Bạn chọn sai định dạng ảnh',
            'NoiBat.required'  => 'Bạn chưa chọn tin nổi bật',
        ];
    }
}
