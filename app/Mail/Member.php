<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;

class Member extends Mailable
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
        return $this->subject('Stödmedlem')
            ->from('peters945@hotmail.com')
            ->markdown('member.mail', ['member' => $this->request->all()]);
    }
}
