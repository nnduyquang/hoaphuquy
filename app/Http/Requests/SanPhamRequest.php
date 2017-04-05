<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;
use Validator;

class SanPhamRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            case 'POST': {
                return [
                    'display_name' => 'required',
                    'anhsanpham' => 'required',
                    'noidung' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'display_name' => 'required',
                ];
            }
        }
    }

    public function messages()
    {
        return [
            'display_name.required' => 'Tên Sản Phẩm Không Để Trống',
            'anhsanpham.required' => 'Mời Thêm Ảnh Sản Phẩm',
            'noidung.required' => 'Mời Nhập Mô Tả Sản Phẩm',
            'price.required' => 'Mời Nhập Giá Sản Phẩm',
            'price.numeric' => 'Giá Sản Phẩm Phải Dạng Số',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->checkGia()) {
                if(strlen(trim(Input::get('price')))==0){
                    $validator->errors()->add('price', 'Giá Không Để Trống');
                }
                elseif(!is_numeric(Input::get('price')) ){
                    $validator->errors()->add('price', 'Mời Nhập Số Tiền');
                }

            }
        });
    }

    public function checkGia()
    {
        $lienhegia = Input::get('lienhegia');
        if ($lienhegia == 1)
            return 1 == 1;
        else {
            return 0 == 1;
        }
    }
}
