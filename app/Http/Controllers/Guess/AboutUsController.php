<?php

namespace App\Http\Controllers\Guess;

use App\Helpers\SetPageTitleHelper;
use App\Http\Controllers\Controller;
use App\Models\User;

class AboutUsController extends Controller
{
    public function index()
    {
        SetPageTitleHelper::setTitle('Về chúng tôi');

        $users =  User::whereIn('role', ['is_admin', 'is_employee'])->get();

        return view('guess.about-us.index', compact('users'));
    }
}
