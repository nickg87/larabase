<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuthorContact extends Mailable
{
    use Queueable, SerializesModels;

    public $data; //or protected $ata;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.authorContact')
            ->from(['address' => 'guliman.nicu@gmail.com', 'name' => $this->data['user_name']])
            ->with('data', $this->data)
            ->subject('Someone send you a mail');
    }
}
