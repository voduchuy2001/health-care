<?php

namespace App\Http\Controllers\Guess;

use App\Helpers\ToastrHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guess\Appointments\StoreAppointmentsRequest;
use App\Mail\Guess\Appointment as GuessAppointment;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use Telegram\Bot\Laravel\Facades\Telegram;

class AppointmentController extends Controller
{
    public $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function store(StoreAppointmentsRequest $request)
    {
        $data =  $request->validated();

        $appointment = $this->appointment->create($data);

        $text = "You have a new appointment us from\n"
            . "<b>User: </b>\n"
            . "$request->name\n"
            . "<b>Email address: </b>\n"
            . "$request->email\n"
            . "<b>Phone number: </b>\n"
            . "$request->phone\n"
            . "<b>Appointment at: </b>\n"
            . $request->date_time;

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_GROUP_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        Mail::to($data['email'])->send(new GuessAppointment($appointment));

        ToastrHelper::success('Thêm mới lịch', $appointment->date_time);

        return redirect()->back()->with('message', 'Đặt lịch ' . $appointment->date . ' thành công.');
    }
}
