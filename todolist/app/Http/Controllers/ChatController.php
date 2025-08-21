<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->get();
        return view('experiments.chat', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $message = new Message();
        $message->user_id = Auth::id();
        $message->content = $request->input('content');
        $message->save();

        return redirect()->route('chat'); // Redirect back to chat
    }
}
