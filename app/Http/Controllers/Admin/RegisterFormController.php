<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\RegisterForm;
use App\Exports\UserDataExport;
use Inertia\Inertia;

class RegisterFormController extends Controller
{
    
    public function index()
    {
        $datas = RegisterForm::with('user')->paginate(2);
        return Inertia::render('Admin/RegisterForm/Index',['datas' => $datas]);
    }
    
    public function detail($id)
    {
        $datas = RegisterForm::with('user')->find($id);
        return Inertia::render('Admin/RegisterForm/RegisterFormDetail',['datas' => $datas]);
    }
    
    public function image($id)
    {
        $datas = RegisterForm::select('avatarUser','frontCardUser','afterCardUser')->where('id','=',$id)->get();
        return Inertia::render('Admin/RegisterForm/RegisterFormImage',['datas' => $datas]);
    }

    public function updateStatus(Request $request,$id)
    {
        $user = RegisterForm::find($id);
        $user->update([
            'status'=> $request->status,
        ]);
        return redirect()->back();
    }

    public function excel(Request $request)
    {
        return Excel::download(UserDataExport::class);
    }
}
