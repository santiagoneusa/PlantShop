<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BillGenerator;
use App\Util\BillPDF;
use App\Util\BillTXT;


class BillServiceProvider extends ServiceProvider {
    public function register(): void
    {
        $this->app->bind(BillGenerator::class, function ($app, $params) {
            $fileType = $params['fileType'];
            if ($fileType == 'PDF') {
                return new BillPDF();
            } elseif ($fileType == 'TXT') {
                return new BillTXT();
            }
        });
    }
} 