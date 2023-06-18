<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SetPageTitleHelper;
use App\Helpers\ToastrHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Appointments\StoreAppointmentsRequest;
use App\Http\Requests\Admin\Appointments\UpdateAppointmentsRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public $appointment;

    public $perPage = 10;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function index(Request $request)
    {
        SetPageTitleHelper::setTitle('Lịch hẹn');
        
        $data = $request['search_keywords'];

        if ($data) {
            $appointments = $this->appointment
                ->where(function ($query) use ($data) {
                    $query->where('phone', 'like', '%' . $data . '%');
                })
                ->paginate($this->perPage);

            $appointments->appends(['search_keywords' => $data]);
        } else {
            $appointments = $this->appointment->orderByDesc('created_at')->paginate($this->perPage);
        }

        return view('admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        SetPageTitleHelper::setTitle('Thêm mới lịch hẹn');

        return view('admin.appointments.create');
    }

    public function store(StoreAppointmentsRequest $request)
    {
        $data = $request->validated();

        $appointment = $this->appointment->create($data);

        ToastrHelper::success('Thêm mới', $appointment->date_time);

        return redirect()->route('admin.appointment.index');
    }

    public function edit($id)
    {
        SetPageTitleHelper::setTitle('Cập nhật lịch hẹn');

        $appointment = $this->appointment->findOrFail($id);

        return view('admin.appointments.edit', compact('appointment'));
    }


    public function update(UpdateAppointmentsRequest $request, $id)
    {
        $data = $request->validated();

        $appointment = $this->appointment->findOrFail($id);

        $appointment->update($data);

        ToastrHelper::success('Cập nhật', $appointment->date_time);

        return redirect()->route('admin.appointment.index');
    }

    public function delete($id)
    {
        $appointment = $this->appointment->findOrFail($id);

        $appointment->delete();

        ToastrHelper::success('Xóa', $appointment->date_time);

        return redirect()->back();
    }
}
