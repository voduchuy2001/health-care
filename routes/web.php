<?php

use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\ContactUsController as AdminContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ServicePackController as AdminServicePackController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guess\AboutUsController;
use App\Http\Controllers\Guess\AppointmentController;
use App\Http\Controllers\Guess\ArticleController;
use App\Http\Controllers\Guess\ContactUsController;
use App\Http\Controllers\Guess\HomeController;
use App\Http\Controllers\Guess\ServiceController;
use App\Http\Controllers\Guess\ServicePackController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us.index');
Route::post('/contact-us/store', [ContactUsController::class, 'store'])->name('contact-us.store');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us.index');
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service-pack', [ServicePackController::class, 'index'])->name('service-pack.index');
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('/service')->controller(AdminServiceController::class)->name('admin.service.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('/service-pack')->controller(AdminServicePackController::class)->name('admin.service-pack.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('/contact')->controller(AdminContactUsController::class)->name('admin.contact.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('/appointment')->controller(AdminAppointmentController::class)->name('admin.appointment.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

    Route::prefix('/user')->controller(UserController::class)->name('admin.user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
    });
});
