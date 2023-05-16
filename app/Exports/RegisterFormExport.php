<?php

namespace App\Exports;

use App\Models\RegisterForm;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Inertia\Inertia;

class RegisterFormExport implements FromView,ShouldAutoSize
{
    use Exportable;

    public function view()
    {
        
    }
}
