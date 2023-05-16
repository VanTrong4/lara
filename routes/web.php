<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailControl;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormConfirmController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RegisterFormController;
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

Route::get('admin/login', function () {
    return Inertia::render('Admin/Login');
})->name("admin.login");
Route::post('admin/login', [AuthController::class,'checkLogin'])->name('admin.checkLogin');

Route::prefix('admin')->middleware('admin.checkLogin')->group(function(){

    Route::get('/logout', [AuthController::class,'logout'])->name("admin.logout");

    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name("admin.dashboard");

    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class,'index'])->name("admin.users");
        
        Route::get('/detail/{id}', [UserController::class,'detail'])->name("admin.users-detail");
        
        Route::get('/create', [UserController::class,'create'])->name("admin.users-create");
        
        Route::get('/edit/{id}', [UserController::class,'edit'])->name("admin.users-edit");
        
        Route::post('/update/{id}', [UserController::class,'update'])->name("admin.users-update");
        
        Route::get('/excel', [UserController::class,'excel'])->name("admin.users-excel");
    });

    Route::prefix('formRegister')->group(function(){
        Route::get('', [RegisterFormController::class,'index'])->name("admin.formRegister");
        
        Route::get('/detail/{id}', [RegisterFormController::class,'detail'])->name("admin.formRegister-detail");
        
        Route::post('/updateStatus/{id}', [RegisterFormController::class,'updateStatus'])->name("admin.formRegister-updateStatus");
        
        Route::get('/image/{id}', [RegisterFormController::class,'image'])->name("admin.formRegister-image");

        Route::post('/pdf/{id}', [RegisterFormController::class,'pdf'])->name("admin.formRegister-pdf");

    });

});


require __DIR__.'/auth.php';
