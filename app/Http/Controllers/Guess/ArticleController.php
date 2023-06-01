<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return view('guess.articles.index');
    }
}
