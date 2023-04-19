<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FormController extends Controller
{
    //
    public function form()
    {
        return Inertia::render('Form');
    }
}
