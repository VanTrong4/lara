<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function checkLogin(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email,'password'=> $request->password])){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login');
        }
    }
}
