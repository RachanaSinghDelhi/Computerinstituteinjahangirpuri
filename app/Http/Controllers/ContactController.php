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
            'messages' => 'required',
        ]);

        // Send the email
        Mail::send('emails.contact', $validated, function ($messages) use ($request) {
            $messages->to('admin@computerinstituteindelhijahangirpuri.com')
                    ->subject('New Contact Form Submission')
                    ->from($request->email, $request->name);
        });

        // Return a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
