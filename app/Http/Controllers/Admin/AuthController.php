<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email,'password'=> $request->password, "is_admin"=>1])){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.renderLogin');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.renderLogin');
    }

    public function checkAuth(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->is_admin){
                return redirect()->route('admin.dashboard');
            }
            return Inertia::render('Admin/Login');
        }
        return Inertia::render('Admin/Login');
    }
} 
