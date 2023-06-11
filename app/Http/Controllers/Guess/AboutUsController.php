<?php

namespace App\Http\Controllers\Guess;

use App\Helpers\SetPageTitleHelper;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        SetPageTitleHelper::setTitle('Về chúng tôi');
        
        return view('guess.about-us.index');
    }
}
