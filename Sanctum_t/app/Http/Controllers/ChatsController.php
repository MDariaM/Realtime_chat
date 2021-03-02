<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;

class ChatsController extends Controller{

    public function __construct(){
        $this->middleware('auth:sanctum');
    }

     /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */

    public function fetchMessages() {
        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */

    public function sendMessage(Request $request) {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);
        
        broadcast(new MessageSent($message->load('user')))->toOthers();

        return['status' => 'success'];
       
    }
}
