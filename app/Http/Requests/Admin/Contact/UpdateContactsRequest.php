<?php

namespace App\Http\Requests\Admin\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'status' => ['nullable', 'in:1'],
        ];
    }
}
