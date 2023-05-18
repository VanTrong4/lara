<?php

namespace App\Exports;

use App\Models\RegisterForm;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class RegisterFormExport implements FromView,ShouldAutoSize
{
    
    private $datas;

    public function __construct(){
        $this->datas = RegisterForm::with('user')->get();
    }

    public function view(): View
    {
        return view('File.RegisterFormExcel',['datas'=>$this->datas]);
    }
}
