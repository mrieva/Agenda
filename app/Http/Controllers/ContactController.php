<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'from' => $validated['from'],
            'message' => $validated['message'],
        ];

        Mail::send([], [], function ($message) use ($data) {
            $message->to('shineggod@gmail.com')
                ->from($data['from'])
                ->subject('Kotak Saran')
                ->text($data['message'])
                ->html('<p>' . $data['message'] . '</p>');
        });

        return back()->with('success', 'Email telah dikirim!');
    }
}
