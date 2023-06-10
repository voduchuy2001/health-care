<?php

namespace App\Http\Controllers\Guess;

use App\Helpers\SetPageTitleHelper;
use App\Http\Controllers\Controller;

class ServicePackController extends Controller
{
    public function index()
    {
        SetPageTitleHelper::setTitle('Gói Dịch vụ');
        
        return view('guess.service-packs.index');
    }
}
