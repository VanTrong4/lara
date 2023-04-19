<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', Rules\Password::defaults()],
            'Furigana' => 'required|string|max:255',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'gender' => 'required',
            'terms' => 'required',
            'emailConfirm' => 'required|string|email|max:255',
            'password_confirmation' => 'same:password'
        ],
        [
            'required' => 'こちらは必須入力となります。',
            'email' => '※正しい書式でご記入ください',
            'gender.required' => '1つのみ選択可能'
        ]);
        if(request()->has('prevalidate')) {
            return redirect()->back();
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Furigana' => $request->Furigana,
            'year' => $request->year,
            'month' => $request->month,
            'day' => $request->day,
            'gender' => $request->gender,
            'emailConfirm' => $request->emailConfirm,
        ]);

        event(new Registered($user));

        return redirect('/thanks');
    }
}
