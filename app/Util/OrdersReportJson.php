<?php

namespace App\Util;

use App\Interfaces\OrdersReport;

class OrdersReportJson implements OrdersReport
{
    public function store(string $json): string
    {
        $decodedData = json_decode($json);

        if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
            return 'Error: JSON inválido';
        }

        $formattedJson = json_encode($decodedData, JSON_PRETTY_PRINT);

        $filePath = storage_path('app/public/reports/report.json');
        file_put_contents($filePath, $formattedJson);

        return $filePath;
    }
}
