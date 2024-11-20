<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;

    public function __construct($subject, $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('forms.email') // Menunjukkan file Blade
                    ->subject($this->subject) // Mengatur subjek email
                    ->with([
                        'subject' => $this->subject, // Kirim variabel subject ke view
                        'message' => $this->message  // Kirim variabel message ke view
                    ]);
    }
}
