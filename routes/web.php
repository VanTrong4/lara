<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailControl;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormConfirmController;
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

require __DIR__.'/auth.php';
