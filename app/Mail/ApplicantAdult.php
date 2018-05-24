<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;

class ApplicantAdult extends Mailable
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
        return $this->subject('Anmälan Folk-högskolenivå')
            ->from(env('MAIL_FROM'))
            ->markdown('applicants.adult.mail', ['applicant' => $this->request->all()]);
    }
}
