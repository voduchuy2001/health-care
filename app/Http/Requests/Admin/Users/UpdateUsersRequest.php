<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
{
    public function rules()
    {
        return [
            'is_admin' => ['in:0,1']
        ];
    }
}
