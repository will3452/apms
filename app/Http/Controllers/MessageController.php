<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function index()
    {
        $inmessages = auth()->user()->inMessages()->latest()->get();
        return view('messages', compact('inmessages'));
    }

    public function show(Message $message)
    {
        if ($message->receiver_id == auth()->id()) {
            $message->update(['read_at' => now()]);
        }

        return view('message', compact('message'));
    }

    public function write()
    {
        $outmessages = auth()->user()->outMessages()->latest()->get();
        return view('writemessage', compact('outmessages'));
    }

    public function sendMessage()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $receiver = User::where('email', $data['email'])->first();

        if (empty($receiver)) {
            return back()->withError('Email was not found to the system!');
        }

        if ($receiver->id == auth()->id()) {
            return back()->withError('Sending message to your account is illegal!');
        }

        Message::create([
            'receiver_id' => $receiver->id,
            'message' => $data['message'],
        ]);

        return back()->withSuccess('message sent!');
    }
}
