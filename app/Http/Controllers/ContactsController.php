<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function contactUs(\App\Http\Requests\ContactsRequest $request)
    {
        Mail::to(env('MAIL_TO'))->send(new \App\Mail\Contact($request));

        Mail::to($request->email)->send(new \App\Mail\ContactCopy($request));

        return response()->json([], 200);
    }

    public function beMember(\App\Http\Requests\ContactsRequest $request)
    {
        Mail::to(env('MAIL_TO'))->send(new \App\Mail\Member($request));

        Mail::to($request->email)->send(new \App\Mail\MemberCopy($request));

        return response()->json([], 200);
    }
}
