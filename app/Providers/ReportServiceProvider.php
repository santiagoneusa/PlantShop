<?php

namespace App\Providers;

use App\Interfaces\OrdersReport;
use App\Util\OrdersReportJson;
use App\Util\OrdersReportXSLX;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    public function register(): void
    {

        $this->app->bind(OrdersReport::class, function ($app, $params) {
            $fileType = $params['fileType'];
            if ($fileType == 'xlsx') {
                return new OrdersReportXSLX();
            } elseif ($fileType == 'json') {
                return new OrdersReportJson();
            }
        });

    }
}
