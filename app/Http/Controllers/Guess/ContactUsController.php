<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('guess.contacts-us.index');
    }
}
