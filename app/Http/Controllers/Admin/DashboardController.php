<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();

        $appointments = Appointment::count();

        $contacts = Contact::count();

        $date = Carbon::today()->subDays(7);
        $appointmentInSevenDays = Appointment::where('created_at', '>=', $date)->count();

        return view('admin.dashboard.index', compact('users', 'contacts', 'appointments', 'appointmentInSevenDays'));
    }
}
