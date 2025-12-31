<?php

namespace App\Http\Controllers;

use App\Service\CsvImportService;

class EmployeeController extends Controller
{
        private $csvImportService;

    public function __construct(CsvImportService $csvImportService)
    {
        $this->csvImportService = $csvImportService;
    }
}
