<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function getMessage(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'sujet' => ['required', 'min:3'],
            'messages' => ['required', 'string'],
        ]);

        Message::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'sujet' => $request->sujet,
            'message' => $request->messages,
        ]);

        return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
    }

    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }
}