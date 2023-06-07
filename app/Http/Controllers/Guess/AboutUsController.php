<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        return view('guess.about-us.index');
    }
}
