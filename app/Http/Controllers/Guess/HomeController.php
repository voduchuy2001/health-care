<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('guess.home.index');
    }
}
