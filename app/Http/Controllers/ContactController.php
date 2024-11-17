<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        // Send the email
        Mail::send('emails.contact', $validated, function ($message) use ($request) {
            $message->to('admin@computerinstituteindelhijahangirpuri.com')
                    ->subject('New Contact Form Submission')
                    ->from($request->email, $request->name);
        });

        // Return a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
