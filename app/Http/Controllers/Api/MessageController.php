<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getMessagesByDate(Request $request){
        $date = $request->date;
        $messages = Message::where('created_at','LIKE', '%'.$date.'%')->where('user_id',$request->user_id)->get();
        $messagesCount = count($messages);
        $data = [
            "message_count" => $messagesCount,
            "date"=> $date 
        ];
        return response()->json([
            // "success" => false,
            "results" => $data
        ]);
    }
}
