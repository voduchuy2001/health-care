<?php

namespace App\Http\Requests\Admin\ServicePack;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicePacksRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'price' => ['nullable'],
            'description' => ['required', 'string'],
            'service_ids' => ['required'],
        ];
    }
}
