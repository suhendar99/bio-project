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
    public $foto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->from('biofarma@mail.com')
       ->view('Admin.email.alertemail')
       ->with(
        [
            'nama' => 'Bioarma',
            'website' => 'www.biofarma.com'
        ])
       ;
    }
}
