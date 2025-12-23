<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // formulier tonen
    public function show()
    {
        return view('contact');
    }

    // formulier verzenden
    public function send(Request $request)
    {
        // 1. validatie van user inputs
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // 2. mail sturen
        Mail::raw(
            "Naam: {$data['name']}\n"
            . "Email: {$data['email']}\n\n"
            . "Bericht:\n{$data['message']}",
            function ($mail) {
                $mail->to('admin@ehb.be')
                    ->subject('Nieuw contactbericht via ImkerHub');
            }
        );

        // 3. succesmelding terugsturen
        return redirect()->route('contact.show')
            ->with('success', 'Je bericht is verzonden!');
    }
}
