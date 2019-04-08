<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    public function show(Message $message)
    {
        return view('messages.show', [
            'message' => $message
        ]);
    }

    public function create(CreateMessageRequest $request)
    {
        $user = $request->user();
        $image = $request->image;

        $message = Message::create([
            'user_id' => $user->id,
            'content' => $request->message,
            // 'image' => $image->store('messages', 'public')
            'image' => 'http://lorempixel.com/600/338?' . mt_rand(0, 100)
        ]);

        return redirect('/messages/' . $message->id);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $messages = Message::search($query)->get();
        $messages->load('user');

        return view('messages.index', [
            'messages' => $messages
        ]);
    }

    public function responses(Message $message)
    {
        $responses = $message->responses;
        $responses->load('user');

        return $responses;
    }
}
