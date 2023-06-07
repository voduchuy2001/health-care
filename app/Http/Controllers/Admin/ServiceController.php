<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServicesRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public $perPage = 10;

    public function index()
    {
        $services = Service::orderByDesc('created_at')->paginate($this->perPage);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(StoreServicesRequest $request)
    {
        
    }
}
