<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Inertia\Inertia;
use App\Models\User;
use App\Exports\UserExport;
use App\Http\Requests\ProfileUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return Inertia::render('Admin/Users/Users',['users' => $users]);
    }

    public function create()
    {
        return redirect()->back();
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
    
    public function excel()
    {
        return Excel::download(new UserExport, 'users-data.csv');
    }
};
