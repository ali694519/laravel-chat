<?php

namespace App\Http\Controllers\Chat;

use App\Events\ChatSent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\NodeVisitor\FirstFindingVisitor;

class ChatController extends Controller
{
    public function index($user_id){
        $receiver = User::findOrFail($user_id);
        return view("chat.index",compact('receiver'));
    }
    public function sendMessage($user_id,Request $request) {
         $receiver = User::findOrFail($user_id);

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = new Message();
        $message->sender = Auth::user()->id;
        $message->receiver = $receiver->id;
        $message->message = $request->message;
        $message->save();

        \broadcast(new ChatSent($receiver, $message));

        return response()->json(['success' => true]);
    }


    public function fetchMessages($receiver_id)
    {
        $messages = Message::where(function($query) use ($receiver_id) {
            $query->where('sender', Auth::user()->id)
                  ->where('receiver', $receiver_id);
        })->orWhere(function($query) use ($receiver_id) {
            $query->where('sender', $receiver_id)
                  ->where('receiver', Auth::user()->id);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }
}
