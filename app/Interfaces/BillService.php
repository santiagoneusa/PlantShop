<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface BillGenerator {
    public function generate(Request $request): void;
}