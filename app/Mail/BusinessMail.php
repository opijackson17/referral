<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BusinessMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $businessObjectData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($businessObjectData)
    {
        $this->businessObjectData = $businessObjectData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.businessEmail', ['business' => $this->businessObjectData]);
    }
}
