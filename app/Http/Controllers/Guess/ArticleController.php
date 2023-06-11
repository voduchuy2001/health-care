<?php

namespace App\Http\Controllers\Guess;

use App\Helpers\SetPageTitleHelper;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        SetPageTitleHelper::setTitle('Bài viết');

        return view('guess.articles.index');
    }
}
