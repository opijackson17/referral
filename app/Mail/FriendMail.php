<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FriendMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $friendDataObject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($friendDataObject)
    {
        $this->friendDataObject = $friendDataObject
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.friendEmail', ['friend' => $this->friendDataObject]);
    }
}
