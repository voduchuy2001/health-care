<?php

namespace App\Http\Controllers\Guess;

use App\Helpers\SetPageTitleHelper;
use App\Http\Controllers\Controller;
use App\Models\ServicePack;

class ServicePackController extends Controller
{
    public $servicePack;

    public function __construct(ServicePack $servicePack)
    {
        $this->servicePack = $servicePack;
    }

    public function index()
    {
        SetPageTitleHelper::setTitle('Gói Dịch vụ');

        $servicePacks = $this->servicePack->orderByDesc('created_at')->get();

        return view('guess.service-packs.index', compact('servicePacks'));
    }
}
