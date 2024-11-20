<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function create()
    {
        return view('email.create');
    }

    public function store(Request $request)
    {
        // Validasi input email
       //dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Kirim email
        Mail::to($request->email)->send(new SendEmail($request->subject, $request->message));

        return redirect()->back()->with('success', 'Email berhasil dikirim!');
    }
}