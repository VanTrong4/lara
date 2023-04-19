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
        if($request->hasFile("avatar")){
            $file = $request->avatar;
            $file_name = $file->getClientOriginalName();
            $file->storeAs('public/image',$file_name);
            $request->merge(['avatarUser'=>$file_name]);
        }
        if($request->hasFile("frontCard")){
            $file = $request->frontCard;
            $file_name = $file->getClientOriginalName();
            $file->storeAs('public/image',$file_name);
            $request->merge(['frontCardUser'=>$file_name]);
        }
        if($request->hasFile("afterCard")){
            $file = $request->afterCard;
            $file_name = $file->getClientOriginalName();
            $file->storeAs('public/image',$file_name);
            $request->merge(['afterCardUser'=>$file_name]);
        }
        return Inertia::render('ConfirmForm',['dataForm'=>$request]);
    }
}
