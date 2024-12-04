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
    public function store(Request $request)
    {
    $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'sujet' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    Message::create($request->all());

    return redirect()->route('messages.index')->with('success', 'Message envoyé avec succès.');
    }
    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        $message->read = true;
        $message->save();
        return redirect()->route('messages.index')->with('success', 'Message marked as read.');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }
}