<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExportController extends Controller
{


    public function csvExport()
    {
        $fileName = 'emp_expo.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName"
        );

        $columns = [
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Date of Birth',
            'Gender',
            'Address',
            'Basic Salary'
        ];

        return response()->stream(function () use ($columns) {
            $file = fopen('php://output', 'w');

            // CSV header
            fputcsv($file, $columns);

            // Stream records (memory friendly)
            Employee::cursor()->each(function ($employee) use ($file) {
                fputcsv($file, [
                    $employee->first_name,
                    $employee->last_name,
                    $employee->email,
                    $employee->phone,
                    $employee->date_of_birth,
                    $employee->gender,
                    $employee->address,
                    $employee->basic_salary,
                ]);
            });

            fclose($file);
        }, 200, $headers);
    }
}
