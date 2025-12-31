<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\CsvImportService;
use Illuminate\Http\Request;

class CsvImportController extends Controller
{
    private $csvImportService;

    public function __construct(CsvImportService $csvImportService)
    {
        $this->csvImportService = $csvImportService;
    }

    public function csvImport(Request $request)
    {
        $this->csvImportService->csvImport($request);
        return response()->json([
            'success' => true,
            'message' => 'CSV importing...'
        ], 200);
    }
}
