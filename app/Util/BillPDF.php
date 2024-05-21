<?php

namespace App\Util;

use App\Interfaces\BillGenerator;
use Illuminate\Http\Request;

class BillPDF implements BillGenerator 
{
    public function generate(Request $request): void
    {
    }
}