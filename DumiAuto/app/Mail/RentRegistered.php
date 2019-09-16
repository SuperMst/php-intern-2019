<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RentRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $rent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rent)
    {
        $this->rent = $rent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.rent-registered');
    }
}
