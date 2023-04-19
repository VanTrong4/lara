<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Mail\MailToUser;
use App\Mail\MailToAdmin;
use Mail;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if($request->hasFile("avatarUser")){
            $file = $request->avatarUser;
            $file_name = $file->hashName();
            $file->storeAs('public/image',$file_name);
            $request->merge(['avatarUser'=>$file_name]);
        }
        if($request->hasFile("frontCardUser")){
            $file = $request->frontCardUser;
            $file_name = $file->hashName();
            $file->storeAs('public/image',$file_name);
            $request->merge(['frontCardUser'=>$file_name]);
        }
        if($request->hasFile("afterCardUser")){
            $file = $request->afterCardUser;
            $file_name = $file->hashName();
            $file->storeAs('public/image',$file_name);
            $request->merge(['afterCardUser'=>$file_name]);
        }
        
        $request->user()->fill($request->validated());

        $request->user()->save();

        $mailData = $request->all();
        Mail::to($mailData['email'])->send(new MailToUser($mailData));
        Mail::to('ps2210001@gmail.com')->send(new MailToAdmin($mailData));
        return Redirect::to('/thanks-sender');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
