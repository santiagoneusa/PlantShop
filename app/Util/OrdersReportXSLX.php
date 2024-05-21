<?php

namespace App\Util;

use App\Interfaces\OrdersReport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OrdersReportXSLX implements OrdersReport
{
    public function store(string $json): string
    {
        $data = json_decode($json, true);

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $column = 1;
        foreach ($data[0] as $key => $value) {
            $sheet->setCellValue([$column, 1], $key);
            $column++;
        }

        $row = 2;
        foreach ($data as $rowData) {
            $column = 1;
            foreach ($rowData as $cell) {
                $sheet->setCellValue([$column, $row], $cell);
                $column++;
            }
            $row++;
        }

        $filePath = storage_path('app/public/reports/report.xlsx');
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return $filePath;
    }
}
