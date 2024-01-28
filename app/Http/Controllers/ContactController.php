<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function sendContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('caternimation@gmail.com')->send(new ContactForm($details));

        return redirect('/contact')->with('success', 'Your message has been sent successfully.');
    }
}
