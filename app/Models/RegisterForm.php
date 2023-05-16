<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RegisterForm extends Model
{
    use HasFactory;

    protected $table = 'tbl_registerform';

    protected $fillable = [
        'idUser',
        'status',
        'name',
        'Furigana',
        'year',
        'month',
        'day',
        'gender',
        'email',
        'preferContact',
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
        'afterCardUser',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'idUser');
    }
}
