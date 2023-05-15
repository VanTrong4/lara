<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailControl;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormConfirmController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
});

Route::get('/thanks', function () {
    return Inertia::render('Thanks',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/form', [FormController::class,'form'])->middleware(['auth', 'verified'])->name('form');

Route::post('/form-confirm', [FormConfirmController::class,'formConfirm'])->middleware(['auth', 'verified'])->name('form-confirm');
Route::get('/form-confirm', function () {
    return Inertia::render('ConfirmForm');
})->middleware(['auth', 'verified'])->name('form-confirm');

Route::post('/thanks-sender', [FormConfirmController::class, 'submitConfirm'])->middleware(['auth', 'verified'])->name('thanks-sender');
Route::get('/thanks-sender', function () {
    return Inertia::render('ThankSender',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->middleware(['auth', 'verified'])->name('thanks-sender');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->group(function(){
    Route::get('/login', function () {
        return Inertia::render('Admin/Login');
    })->name("admin.login");

    Route::post('/login', [AuthController::class,'checkLogin'])->name('admin.checkLogin');

    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name("admin.dashboard");

    Route::get('/users', function () {
        return Inertia::render('Admin/Users');
    })->name("admin.users");
    
    Route::get('/formRegister', function () {
        return Inertia::render('Admin/RegisterForm');
    })->name("admin.formRegister");
});


require __DIR__.'/auth.php';
