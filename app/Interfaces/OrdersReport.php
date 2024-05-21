<?php

namespace App\Interfaces;

interface OrdersReport
{
    public function store(string $Json): string;
}
