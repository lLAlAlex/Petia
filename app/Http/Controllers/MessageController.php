<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($id)
    {
        $messages = Message::where('conversationID', $id)->get();
        $conversation = Conversation::where('id', $id)->first();

        return view('chat', compact('messages', 'conversation'));
    }

    public function createMessage(Request $request, $id)
    {
        $message = new Message();

        $message->conversationID = $id;
        $message->from = auth()->user()->id;
        if (auth()->user()->role != 'Shelter') {
            $message->to = $request->shelterID;
        } else {
            $message->to = $request->userID;
        }
        $message->text = $request->message;
        $message->createdAt = Carbon::now();
        $message->save();

        $conversation = Conversation::find($id);
        $conversation->latestMessage = $request->message;
        $conversation->lastUpdated = Carbon::now();
        $conversation->save();

        return redirect()->back();
    }
}
