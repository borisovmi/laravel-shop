<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Message;
use App\Answer;
use App\User;
use Session;

class MessageController extends MainController {

    
    /* sending the 1st message from contact-us page */
    public function sendMessage(MessageRequest $request) {
        if (Message::sendMessage($request)) {
            Session::flash('ms', 'Thank you for your message! We will contact you as soon as possible');
            return redirect('contact-us');
        } else {
            return redirect('contact-us')->withErrors('something went wrong');
        }
    }
    
    
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= "CMS messages";
        self::$data['inner_title'] = "Messages";
        self::$data['messages'] = Message::all()->toArray();
        self::$data['users'] = User::all()->toArray();
        return view('cms.showMessage', self::$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= "Add message";
        self::$data['inner_title'] = "Add message";
        return view('cms.addMessage', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* adding an answer to the message */
    public function store(MessageRequest $request) {
        if (Answer::addAnswer($request)) {
            Session::flash('ms', "Answer is added");
            return redirect('cms/message/'.$request['message_id'].'/details');
        } else {
            return redirect("cms/message")->withErrors('something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Message::find($id)) {
            self::$data['post_id'] = $id;
            self::$data['title'] .= 'Delete message';
            self::$data['inner_title'] = 'Delete message';
            return view("cms/deleteMessage", self::$data);
        } else {
            return redirect('cms/message')->withErrors('Message not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $thread = Message::find($id)->toArray();
        if (Message::find($id)) {
            self::$data['original'] = $thread;
            self::$data['title'] .= 'Update answer';
            self::$data['inner_title'] = 'Update answer';
            return view('cms/updateAnswer', self::$data);
        } else {
            return redirect('cms/message')->withErrors('Message not found');
        }
    }

    
    /* show the full conversation in CMS */
    public function getMessageDetails($id) {
        $thread = Message::find($id)->toArray();
        if (Message::find($id)) {
            self::$data['original'] = $thread;
            self::$data['user'] = User::find($thread['user_id'])->toArray();
            self::$data['message_data'] = Answer::where('message_id', '=', $thread['id'])->get()->toArray();
            self::$data['title'] .= 'Message details';
            self::$data['inner_title'] = 'Message details';
            return view('cms/detailedMessage', self::$data);
        } else {
            return redirect('cms/menu')->withErrors('Message not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Message::destroy($id);
        Session::flash('ms', "message is deleted");
        return redirect('cms/message');
    }

}
