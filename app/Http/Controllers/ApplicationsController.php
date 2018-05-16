<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $this->applicant->populate($request->all())->type($request->type)->save();

        return response()->json([], 200);
    }
}
