<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegisterForm;
use Inertia\Inertia;

class RegisterFormController extends Controller
{
    
    public function index()
    {
        $datas = RegisterForm::with('user')->paginate(2);
        return Inertia::render('Admin/RegisterForm/Index',['datas' => $datas]);
    }

    public function create()
    {
        return Inertia::render('Admin/Users/UsersCreate');
    }
    
    public function detail($id)
    {
        $user = User::find($id);
        return Inertia::render('Admin/Users/UsersDetail',['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return Inertia::render('Admin/Users/UsersEdit',['user' => $user]);
    }
    
    public function update(ProfileUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name'=> $request->name,
            'Furigana'=> $request->Furigana,
            'year'=> $request->year,
            'month'=> $request->month,
            'day'=> $request->day,
            'gender'=> $request->gender,
            'email'=> $request->email,
            'is_admin'=> $request->is_admin,
        ]);
        return redirect()->route('admin.users-edit',$id);
    }
    
    public function delete(Request $request)
    {
    }
}
