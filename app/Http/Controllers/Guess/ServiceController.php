<?php

namespace App\Http\Controllers\Guess;

use App\Helpers\SetPageTitleHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public $service;

    public $perPage = 3;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        SetPageTitleHelper::setTitle('Dịch vụ');

        $services = $this->service->orderByDesc('created_at')->paginate($this->perPage);

        return view('guess.services.index', compact('services'));
    }
}
