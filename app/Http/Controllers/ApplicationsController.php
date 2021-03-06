<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Applicant;

class ApplicationsController extends Controller
{
    public function __construct()
    {
        $this->applicant = new Applicant;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|integer|in:1,2,3'
        ]);

        $rules = [
            Applicant::ADULT     => new \App\Http\Requests\CreateApplicantAdultRequest,
            Applicant::YOUNG     => new \App\Http\Requests\CreateApplicantYoungRequest,
            Applicant::VOLUNTEER => new \App\Http\Requests\CreateApplicantVolunteerRequest
        ];

        $request->validate($rules[$request->type]->rules());

        $mail = [
            Applicant::ADULT => [
                'message' => \App\Mail\ApplicantAdult::class,
                'copy'    => \App\Mail\ApplicantAdultCopy::class
            ],
            Applicant::YOUNG => [
                'message' => \App\Mail\ApplicantYoung::class,
                'copy'    => \App\Mail\ApplicantYoungCopy::class
            ],
            Applicant::VOLUNTEER => [
                'message' => \App\Mail\ApplicantVolunteer::class,
                'copy'    => \App\Mail\ApplicantVolunteerCopy::class
            ]
        ];

        $this->applicant->populate($request->all())->type($request->type)->save();

        Mail::to(env('MAIL_TO'))->send(new $mail[$request->type]['message']($request));

        Mail::to($request->email)->send(new $mail[$request->type]['copy']($request));

        return response()->json([], 200);
    }
}
