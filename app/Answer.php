<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

    
    /* add answer to the message thread to DB */
    static public function addAnswer($request) {
        $answer = new self();
        $answer->message_id = $request->message_id;
        $answer->user_id = session('user_id');
        $answer->text = $request->text;
        $answer->save();
        if ($answer->id) {
            return true;
        }
        return false;
    }

}
