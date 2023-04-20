<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'max:255'],
            'email' => ['required','email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'Furigana' => ['required','string', 'max:255'],
            'year' => ['required', 'max:255'],
            'month' => ['required','max:255'],
            'day' => ['required','max:255'],
            'gender' => ['required','string', 'max:255'],
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
            'avatar' => ['image','file','max:1024'],
            'frontCard' => ['image','file','max:1024'],
            'afterCard' => ['image','file','max:1024'],
            'avatarUser' => ['string'],
            'frontCardUser' => ['string'],
            'afterCardUser' => ['string'],
        ];
    }
    public function messages()
    {
        return [
            'required' => 'こちらは必須入力となります。',
            'email' => '※正しい書式でご記入ください',
            'gender.required' => '1つのみ選択可能',
            'preferContact.required' => '1つのみ選択可能',
            'typeAccount.required' => '1つのみ選択可能',
        ];
    }
}
