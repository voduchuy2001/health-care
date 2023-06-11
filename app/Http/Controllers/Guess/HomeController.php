<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicePack;

class HomeController extends Controller
{
    public $service, $servicePack;

    public function __construct(Service $service, ServicePack $servicePack)
    {
        $this->service = $service;
        $this->servicePack = $servicePack;
    }

    public function index()
    {
        $services = $this->service->orderByDesc('created_at')->get();
        $servicePacks = $this->servicePack->orderByDesc('created_at')->get();

        return view('guess.home.index', compact('services', 'servicePacks'));
    }
}
