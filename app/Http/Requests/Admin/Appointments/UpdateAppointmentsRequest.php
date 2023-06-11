<?php

namespace App\Http\Requests\Admin\Appointments;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'phone' => ['required', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'date_time' => ['required', 'after:' . Carbon::now()],
            'email' => ['required', 'email'],
            'notes' => ['nullable'],
            'status' => ['nullable'],
        ];
    }
}
