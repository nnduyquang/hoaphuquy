<?php

namespace App\Http\Requests;

use App\DanhMuc;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class DanhMucRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'tieude' => 'Tên danh mục'
        ];
    }

    public function messages()
    {
        return [
            'display_name.required' => 'Tện Danh Mục Không Để Trống',
        ];
    }

    public function withValidator($validator)
    {
        if ($this->method() == 'POST') {
            $validator->after(function ($validator) {
                if ($this->checkIfExistValue()) {
                    $validator->errors()->add('display_name', 'Tên Danh Mục Đã Tồn Tại');
                }
            });
        }
    }

    public function checkIfExistValue()
    {
        $display_name = Input::get('display_name');
        $path = vn_str_co_dau_thanh_khong_dau($display_name);
        $path = preg_replace('/\s+/', ' ', $path);
        $path = str_replace(' ', '-', $path);
        if (DanhMuc::where('path', '=', $path)->exists()) {
            return 1 == 1;
        } else {
            return 0 == 1;
        }
    }
}
