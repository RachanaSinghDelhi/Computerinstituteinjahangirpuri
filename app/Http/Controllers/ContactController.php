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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'messages' => 'required|string|max:2000',
        ]);

        // Prepare data for the email
        $emailData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'userMessage' => $validated['messages'], // Renamed to avoid conflict
        ];

        // Send the email
        Mail::send('emails.contact', $emailData, function ($mail) use ($request) {
            $mail->to('admin@computerinstituteindelhijahangirpuri.com')
                 ->subject('New Contact Form Submission')
                 ->from($request->email, $request->name);
        });

        // Return a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
