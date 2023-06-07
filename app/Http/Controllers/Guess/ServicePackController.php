<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;

class ServicePackController extends Controller
{
    public function index()
    {
        return view('guess.service-packs.index');
    }
}
