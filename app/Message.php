<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use App\Answers;

class Message extends Model {

    /* add a new message (open a new converastion with admin) from contact-us page */
    public static function sendMessage($request) {      
        $message = new self();
        /* check if the message from user who has logged in */
        if ($request->session()->get('user_id')) {
            $message->user_id = $request->session()->get('user_id');
        } else {
            $message->user_id = 0;
        }
        $message->first_message = $request->first_message;
        $message->title = substr($request->first_message, 0, 24);
        /* if user is loogged in these fields are filled in automatically using session info */
        $message->name = $request->name;
        $message->email = $request->email;
        $message->save();
        if ($message->id) {
            return true;
        }
        return false;
    }

    
    /* get all conversations for a user */
    static public function getUserMessages($user_id) {
        $messages = Message::where('user_id', $user_id)->get()->toArray();
        return $messages;
    }
    

}
