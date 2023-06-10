<?php

namespace App\Http\Requests\Admin\ServicePack;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicePacksRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'services' => ['required'],
        ];
    }
}
