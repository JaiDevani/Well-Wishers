<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DonationEvent extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$amount,$date,$project;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$amount,$project)
    {
        $this->name = $name;
        $this->amount=$amount;
        $this->project=$project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.donation');
    }
}
