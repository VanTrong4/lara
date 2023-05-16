<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class UserExport implements FromView,ShouldAutoSize
{
    
    private $users;

    public function __construct(){
        $this->users = User::all();
    }

    public function view(): View
    {
        return view('file.UserExcel',['users'=>$this->users]);
    }
}
