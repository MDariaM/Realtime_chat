<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Message;

class ChatsController extends Controller{
    public function __construct(){
        $this->middleware('auth:sanctum');
    }

    public function index() {
        return view('chat');
    }

    public function fetchMessages() {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request) {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

        return['status' => 'success'];
    }
}
