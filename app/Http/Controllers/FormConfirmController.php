<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use DB;
use Inertia\Inertia;
use App\Mail\MailToUser;
use App\Mail\MailToAdmin;
use Mail;

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
    public function submitConfirm(Request $request)
    {
        $request->validate([
            'preferContact' => ['required','string', 'max:255'],
            'LINEID' => ['required','string', 'max:255'],
            'postCodeBef' => ['required','max:255'],
            'postCodeAfter' => ['required','max:255'],
            'district' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'apartmentName' => ['required','string', 'max:255'],
            'postCodeComBef' => ['required','max:255'],
            'postCodeComAfter' => ['required','max:255'],
            'districtCom' => ['required', 'max:255'],
            'cityCom' => ['required', 'max:255'],
            'addressCom' => ['required', 'max:255'],
            'apartmentNameCom' => ['required','string', 'max:255'],
            'telephoneCom' => ['required','max:255'],
            'bankName' => ['required','string', 'max:255'],
            'branchName' => ['required','string', 'max:255'],
            'teleBranch' => ['required','max:255'],
            'typeAccount' => ['required','string', 'max:255'],
            'account' => ['required','max:255'],
            'accountName' => ['required','string', 'max:255'],
            'avatarUser' => ['string'],
            'frontCardUser' => ['string'],
            'afterCardUser' => ['string'],
        ]);
        $value = $request->only(['preferContact',
        'LINEID',
        'postCodeBef',
        'postCodeAfter',
        'district',
        'city',
        'address',
        'apartmentName',
        'postCodeComBef',
        'postCodeComAfter',
        'districtCom',
        'cityCom',
        'addressCom',
        'apartmentNameCom',
        'telephoneCom',
        'bankName',
        'branchName',
        'teleBranch',
        'typeAccount',
        'account',
        'accountName',
        'avatarUser',
        'frontCardUser',
        'afterCardUser',]);
        $value = array_merge($value,array("idUser"=>auth()->user()->id));
        DB::table('tbl_registerForm')->insert($value);
        $mailData = $request->all();
        Mail::to($mailData['email'])->send(new MailToUser($mailData));
        Mail::to('ps2210001@gmail.com')->send(new MailToAdmin($mailData));
        return redirect('/thanks-sender');
    }
}
