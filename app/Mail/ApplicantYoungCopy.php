<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;

class ApplicantYoungCopy extends Mailable
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
            ->from(env('MAIL_FROM'))
            ->markdown('applicants.young.copy', ['applicant' => $this->request->all()]);
    }
}
