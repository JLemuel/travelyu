<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Assume you have a method to fetch the tourist user, for example:
        $travel_agency = User::where('type', 'travel_agency')->firstOrFail();

        Mail::to($travel_agency->email)->send(new ContactFormMail($validatedData));

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }

}
