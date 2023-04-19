<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormConfirmController extends Controller
{
    //
    public function formConfirm(ProfileUpdateRequest $request)
    {
        return Inertia::render('ConfirmForm',['dataForm'=>$request]);
    }
}
