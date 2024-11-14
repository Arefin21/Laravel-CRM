<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordEmail extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct($data)
    {
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
//    public function build()
//    {
//        return $this->from(env('MAIL_USERNAME'), 'Women and Ecommerce')->subject("Welcome to weforumbd.com!")->view('mail.signup-email', ['email_data' => $this->email_data]);
//    }

    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), 'Women and e-Commerce')->subject("User Credential Email!")->view('mail.passwordEmail', ['email_data' => $this->email_data]);
    }
}