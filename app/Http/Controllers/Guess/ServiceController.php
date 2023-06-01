<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        return view('guess.services.index');
    }
}
