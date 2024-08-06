<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Google2faSecretMail extends Mailable
{
    use Queueable, SerializesModels;

    public $secret;

    public function __construct($secret)
    {
        $this->secret = $secret;
    }

    public function build()
    {
        return $this->view('emails.google2fa_secret');
    }
}
