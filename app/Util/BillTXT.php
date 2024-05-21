<?php

namespace App\Util;

use App\Interfaces\BillGenerator;
use Illuminate\Http\Request;

class BillTXT implements BillGenerator 
{
    public function generate(Request $request): void
    {
    }
}