<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestMade extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $amount;
    public $name;

    public function __construct($amount, $full_name)
    {
        $this->amount = $amount;
        $this->name = $full_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.request')->subject("The Request you just made, ".$this->name)
                    ->with('amount', $this->amount)->with('name', $this->name);
    }
}
