<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
{
    public function rules()
    {
        return [
            'role' => ['in:is_admin,is_user,is_employee']
        ];
    }
}
