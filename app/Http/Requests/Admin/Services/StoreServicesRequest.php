<?php

namespace App\Http\Requests\Admin\Services;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicesRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'price' => str_replace('.', '', $this->input('price')),
        ]);
    }
    
    public function rules()
    {
        return [
            'image' => ['required', 'image', 'max:4096'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'description' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Trường này không được bỏ trống.',
            'image.image' => 'Chỉ chấp nhận hình ảnh.',
            'image.max' => 'Tối đa 4mb.',
            'name.required' => 'Trường này không được bỏ trống.',
            'price.required' => 'Trường này không được bỏ trống.',
            'description.required' => 'Trường này không được bỏ trống.',
        ];
    }
}
