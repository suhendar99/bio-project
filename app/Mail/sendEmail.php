<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $alert;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $alert)
    {
        $this->user = $user;
        $this->alert = $alert;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this
       ->view('Admin.Email.alertemail')
       ->with(
        [
            'nama' => 'Bioarma',
            'website' => 'www.biofarma.com'
        ])
       ;
    }
}
