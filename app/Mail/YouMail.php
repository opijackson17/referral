<?php

namespace App\Mail;

use App\Models\You;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

class YouMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $youJointDataObject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($youJointDataObject)
    {
        $this->youJointDataObject = $youJointDataObject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.youEmail', ['you' => $this->youJointDataObject]);
    }
}
