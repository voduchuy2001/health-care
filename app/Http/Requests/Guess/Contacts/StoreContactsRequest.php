<?php

namespace App\Http\Requests\Guess\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
        ];
    }
}
