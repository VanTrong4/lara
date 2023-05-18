<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Inertia\Inertia;
use App\Models\User;
use App\Exports\UserExport;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Validation\Rule;

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
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','string', 'max:255'],
            'email' => ['required','email', 'max:255'],
            'Furigana' => ['required','string', 'max:255'],
            'year' => ['required', 'max:255'],
            'month' => ['required','max:255'],
            'day' => ['required','max:255'],
            'gender' => ['required','string', 'max:255'],
        ]);
        $user = User::find($id);
        $user->update([
            'name'=> $request->name,
            'Furigana'=> $request->Furigana,
            'year'=> $request->year,
            'month'=> $request->month,
            'day'=> $request->day,
            'gender'=> $request->gender,
            'is_admin'=> $request->is_admin,
        ]);
        return redirect()->route('admin.users-edit',$id)->with('message','Update User Success!');
    }
    
    public function excel()
    {
        return Excel::download(new UserExport, 'users-data.csv');
    }
};
