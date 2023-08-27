<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultationMail extends Mailable
{
    use SerializesModels;

    public $email;
    public $recipientType;

    public function __construct($email, $recipientType)
    {
        $this->email = $email;
        $this->recipientType = $recipientType;
    }

    public function build()
    {
        $subject = ($this->recipientType === 'admin') ? 'New Consultation Request' : 'Consultation Registration Confirmation';

        return $this->subject($subject)
            ->view('emails.consultation')
            ->with([
                'email' => $this->email,
                'recipientType' => $this->recipientType,
            ]);
    }
}
