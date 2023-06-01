<?php

use App\Http\Controllers\Guess\AboutUsController;
use App\Http\Controllers\Guess\ArticleController;
use App\Http\Controllers\Guess\ContactUsController;
use App\Http\Controllers\Guess\HomeController;
use App\Http\Controllers\Guess\ServiceController;
use App\Http\Controllers\Guess\ServicePackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us.index');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us.index');
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service-pack', [ServicePackController::class, 'index'])->name('service-pack.index');
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
