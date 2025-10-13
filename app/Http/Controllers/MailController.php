<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // Contact form handler
    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone_number' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:1000',
        ]);

        try {
            Mail::raw(
                "📩 New Contact Form Submission\n\n".
                "Name: {$validated['name']}\n".
                "Email: {$validated['email']}\n".
                "Phone: {$validated['phone_number']}\n".
                "Subject: {$validated['subject']}\n".
                "Message:\n{$validated['message']}",
                function ($mail) use ($validated) {
                    $mail->to("ammarmalik046@gmail.com") // change this
                         ->subject("New Contact: " . ($validated['subject'] ?? 'No Subject'))
                         ->replyTo($validated['email'], $validated['name']);
                }
            );

            return back()->with('success', '✅ Contact form sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', '❌ Contact form failed: '.$e->getMessage());
        }
    }

    // Appointment form handler
    public function sendAppointment(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        try {
            Mail::raw(
                "📅 New Appointment Request\n\n".
                "Name: {$validated['name']}\n".
                "Email: {$validated['email']}\n".
                "Message:\n{$validated['message']}",
                function ($mail) use ($validated) {
                    $mail->to("ammarmalik046@gmail.com") // change this
                         ->subject("New Appointment Request")
                         ->replyTo($validated['email'], $validated['name']);
                }
            );
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => '❌ Appointment form failed: '.$e->getMessage()]);
        }
    }
}
