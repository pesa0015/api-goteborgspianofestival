<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;

class Contact extends Mailable
{
    private $request;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tack för din ansökan')
            ->from('peters945@hotmail.com')
            ->markdown('contact.mail', ['contact' => $this->request->all()]);
    }
}
