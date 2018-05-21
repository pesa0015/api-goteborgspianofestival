<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\ContactCopy;

class ContactsController extends Controller
{
    public function contactUs(ContactsRequest $request)
    {
        Mail::to(env('MAIL_TO'))->send(new Contact($request));

        Mail::to($request->email)->send(new ContactCopy($request));

        return response()->json([], 200);
    }

    public function beMember(\App\Http\Requests\ContactsRequest $request)
    {
        Mail::to(env('MAIL_TO'))->send(new \App\Mail\Member($request));

        Mail::to($request->email)->send(new \App\Mail\MemberCopy($request));

        return response()->json([], 200);
    }
}
