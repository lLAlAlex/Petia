<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'Shelter') {
            $conversations = Conversation::where('shelterID', auth()->user()->id)->orderByDesc('lastUpdated')->get();
        } else {
            $conversations = Conversation::where('userID', auth()->user()->id)->orderByDesc('lastUpdated')->get();
        }
        $shelterIDsInConversations = Conversation::where('userID', auth()->user()->id)->pluck('shelterID')->toArray();
        $shelters = User::where('role', 'Shelter')->whereNotIn('id', $shelterIDsInConversations)->get();
        
        return view('messenger', compact('conversations', 'shelters'));
    }

    public function createConversation(Request $request)
    {
        $conversation = new Conversation();
        $conversation->userID = auth()->user()->id;
        $conversation->shelterID = $request->shelter;
        $conversation->latestMessage = "";
        $conversation->lastUpdated = Carbon::now();

        $conversation->save();

        return redirect()->back();
    }
}
