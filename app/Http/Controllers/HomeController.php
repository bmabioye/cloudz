<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // Make sure `home.blade.php` exists
    }

    public function mentorship()
    {
        return view('mentorship'); // Make sure `home.blade.php` exists
    }

    public function fastcert()
    {
        return view('fastcert.landing'); // Make sure `home.blade.php` exists
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Logic to send the email
        $details = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        // Send email
        Mail::send('emails.contact', $details, function ($message) use ($details) {
            $message->to(env('CONTACT_EMAIL', 'support@cloudzone.com'))
                ->subject('New Contact Message from ' . $details['name']);
        });

        return redirect()->route('contact')->with('success', 'Thank you for reaching out. We will get back to you shortly.');
    }
}
