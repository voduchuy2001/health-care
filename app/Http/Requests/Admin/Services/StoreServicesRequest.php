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
}
