<?php

namespace App\Service;

use App\Jobs\ImportEmployeeCsvJob;

class CsvImportService
{
    public function csvImport($data)
    {
        $path = $data->file('file')->store('csv');
        ImportEmployeeCsvJob::dispatch(storage_path('app/private/' . $path));
        return true;
    }
}
