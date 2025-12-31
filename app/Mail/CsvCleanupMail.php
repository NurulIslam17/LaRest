<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CsvCleanupMail extends Mailable
{

    public $count;

    public function __construct($count)
    {
        $this->count = $count;
    }

    public function build()
    {
        return $this->subject('CSV Cleanup Completed')
        ->view('emails.csv-cleanup')
        ->with([
            'count' => $this->count
        ]);
    }
}
