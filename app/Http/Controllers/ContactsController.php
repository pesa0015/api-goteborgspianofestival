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
}
