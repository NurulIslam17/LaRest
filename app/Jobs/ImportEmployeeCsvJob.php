<?php

namespace App\Jobs;

use App\Mail\CsvImportSuccessMail;
use App\Models\Employee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Traits\InteractsWithData;

class ImportEmployeeCsvJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected string $filePath;

    /**
     * Create a new job instance.
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $handle = fopen($this->filePath, 'r');
        fgetcsv($handle);  //skip the header row

        $chunksize = 500;
        // Loop until end of file (EOF)
        while (!feof($handle)) {
            $rows = [];
            for ($i = 0; $i < $chunksize; $i++) {
                $data = fgetcsv($handle);
                if ($data === false) {
                    break;
                }
                $rows[] = [
                    'first_name'    => $data[0],
                    'last_name'     => $data[1],
                    'email'         => $data[2],
                    'phone'         => $data[3],
                    'date_of_birth' => $data[4],
                    'gender'        => $data[5],
                    'address'       => $data[6],
                    'basic_salary'  => $data[7],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ];
            }

            if (!empty($rows)) {
                Employee::insert($rows);
            }
        }
        fclose($handle);
        // ✅ Send mail after success
        Mail::to("nurulcse09@gmail.com")->send(new CsvImportSuccessMail());
    }
}
