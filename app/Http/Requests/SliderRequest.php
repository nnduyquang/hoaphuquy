<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                    'order' => 'numeric|nullable',
                    'anhslider' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'order' => 'numeric|nullable',
                ];
            }
        }
    }
    public function messages()
    {
        return [
            'anhslider.required' => 'Mời Thêm Slider',
            'order.numeric' => 'Mời Nhập Dạng Số',
        ];
    }
}
