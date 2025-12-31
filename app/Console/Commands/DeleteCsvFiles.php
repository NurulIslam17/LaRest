<?php

namespace App\Console\Commands;

use App\Mail\CsvCleanupMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DeleteCsvFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all CSV files from storage/app/csv';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $files = Storage::files('csv');
        if (empty($files)) {
            $this->info('No CSV files found.');
            return;
        }
        Storage::delete($files);
        $this->info(count($files) . ' CSV files deleted successfully.');

        Mail::to("nurulcseo9@gmail.com")->send(new CsvCleanupMail(count($files)));
    }
}
