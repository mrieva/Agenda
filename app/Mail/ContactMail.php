<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $from;
    public $message;

    public function __construct($from, $message)
    {
        $this->from = $from;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('emails.contact') // Ganti dengan path ke view Anda
                    ->from($this->from)
                    ->subject('Kotak Saran')
                    ->with([
                        'message' => $this->message,
                    ]);
    }
}
