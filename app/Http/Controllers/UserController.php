<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\MessageRequest;
use App\User;
use App\Order;
use App\Message;
use App\Answer;
use Session;

class UserController extends MainController {
    /* show signin page */

    public function getSignin() {
        self::$data['title'] .= "Sign In";
        return view('forms.signin', self::$data);
    }

    /* show signup page */

    public function getSignup() {
        self::$data['title'] .= "Sign In";
        return view('forms.signup', self::$data);
    }

    /* validating the user on sign in request */

    public function userValidate(SigninRequest $request) {
        if (User::validateUser($request)) {
            return redirect('/');
        } else {
            return redirect('user/signin')->withErrors("invalid password or email");
        }
    }

    /* bringing up the home page after logging out, deleting all session data */

    public function logout() {
        Session::flush();
        self::$data['title'] .= "Home";
        return redirect('/');
    }

    /* sign up as a new user */

    public function insertUser(SignupRequest $request) {
        if (User::insertUser($request)) {
            Session::flash('ms', 'User created, please sign in');
            return redirect('user/signin');
        } else {
            
        }
    }

    /* show user personal area page */

    public function getUserHome($user_id) {
        self::$data['title'] .= " user page";
        self::$data['inner_title'] = "My profile";
        if (session('user_id') == $user_id) {
            return view("user.userHome", self::$data);
        } else {
            return redirect('/')->withErrors("You're not allowed to see this page");
        }
    }

    /* show user personal details page on client side */

    public function getUserProfile($user_id) {
        if (User::find($user_id) && session('user_id') == $user_id) {
            self::$data['user'] = User::find($user_id)->toArray();
            self::$data['title'] .= 'User profile';
            self::$data['inner_title'] = 'User profile';
            return view('user.userProfile', self::$data);
        } else {
            return redirect('/')->withErrors("You're not allowed to see this page");
        }
    }

    /* show page to edit user personal details on client side */

    public function editUser($user_id) {
        if (User::find($user_id)) {
            self::$data['user'] = User::find($user_id)->toArray();
            self::$data['title'] .= 'Update user';
            self::$data['inner_title'] = 'Update user';
            return view('user.userEdit', self::$data);
        } else {
            return redirect('/')->withErrors("You're not allowed to see this page");
        }
    }

    /* upate user personal details */

    public function updateUser(SignupRequest $request, $id) {
        if (User::updateUser($request, $id)) {
            Session::flash('ms', "User data is updated");
            return redirect('user/' . $id . '/profile');
        } else {
            return redirect("user/'.$id.'/profile")->withErrors('something went wrong');
        }
    }

    /* show all user's orders */

    public function getUserOrders($user_id) {
        self::$data['title'] .= " User page";
        self::$data['inner_title'] = "My orders";
        if (session('user_id') == $user_id) {
            $orders = Order::getOrdersByUser($user_id);
            self::$data['orders'] = $orders->toArray();
            return view("user.userOrders", self::$data);
        } else {
            return redirect('/')->withErrors("You're not allowed to see this page");
        }
    }

    /* show order details on user's page on client side */

    public function getOrderDetails($user_id, $order_id) {
        self::$data['title'] .= " Order details";
        self::$data['inner_title'] = "Order details";
        if (session('user_id') == $user_id) {
            $order = Order::getOrderById($order_id)->toArray();
            if ($order) {
                self::$data['order'] = $order;
                self::$data['totalPrice'] = 0;
                self::$data['totalQuantity'] = 0;
                return view("user.userOrderDetails", self::$data);
            } else {
                return redirect('user/' . $user_id . '/orders')->withErrors("Order not found");
            }
        } else {
            return redirect('/')->withErrors("You're not allowed to see this page");
        }
    }

    /* show all messages (conversations) on user's page on client side */

    public function getMessages($user_id) {
        if (session('user_id') == $user_id) {
            self::$data['title'] .= ' Messages';
            self::$data['inner_title'] = 'Messages';
            $messages = Message::getUserMessages($user_id);
            self::$data['messages'] = $messages;
            return view("user.userMessages", self::$data);
        } else {
            return redirect('/')->withErrors("You're not allowed to see this page");
        }
    }

    /* show all messages in conversation on user's page on client side */
    public function getMessageDetails($user_id, $message_id) {
        self::$data['title'] .= 'Message details';
        self::$data['inner_title'] = 'Message details';
        if (session('user_id') == $user_id) {
            if (Message::find($message_id)) {
                $thread = Message::find($message_id)->toArray();
                self::$data['original'] = $thread;
                self::$data['user'] = User::find($thread['user_id'])->toArray();
                self::$data['message_data'] = Answer::where('message_id', '=', $thread['id'])->get()->toArray();
                return view('user/userMessageDetails', self::$data);
            } else {
                return redirect('user/' . $user_id . '/messages')->withErrors('Message not found');
            }
        } else {
            return redirect('/')->withErrors("You're not allowed to see this page");
        }
    }

    /* show page to add answer to admin in converstion*/

    public function editAnswer($user_id, $message_id) {
        if (session('user_id') == $user_id) {
            if (Message::find($message_id)) {
                self::$data['original'] = Message::find($message_id)->toArray();
                self::$data['title'] .= 'Update answer';
                self::$data['inner_title'] = 'Update answer';
                return view('user/answerMessage', self::$data);
            } else {
                return redirect('user/' . session("user_id") . '/messages')->withErrors('Message not found');
            }
        } else {
            return redirect('/')->withErrors("You're not allowed to see this page");
        }
    }

    
    /* add answer to admin in converstion*/
    public function updateAnswer(MessageRequest $request) {
        if (Answer::addAnswer($request)) {
            Session::flash('ms', "Answer is added");
            return redirect('user/' . session("user_id") . '/messages/' . $request->message_id);
        } else {
            return redirect("user/" . session("user_id") . "/messages")->withErrors("something went wrong");
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= "CMS user";
        self::$data['inner_title'] = "User";
        self::$data['users'] = User::all()->toArray();
        return view('cms.showUser', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= "Add user";
        self::$data['inner_title'] = "Add user";
        return view('cms.addUser', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignupRequest $request) {
        if (User::insertUser($request)) {
            Session::flash('ms', "User is added");
            return redirect('cms/user');
        } else {
            return redirect("cms/user")->withErrors('something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (User::find($id)) {
            self::$data['user_id'] = $id;
            self::$data['title'] .= 'Delete user';
            self::$data['inner_title'] = 'Delete user';
            return view("cms/deleteUser", self::$data);
        } else {
            return redirect("cms/user")->withErrors('User not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (User::find($id)) {
            self::$data['user'] = User::find($id)->toArray();
            self::$data['title'] .= 'Update user';
            self::$data['inner_title'] = 'Update user';
            return view('cms/updateUser', self::$data);
        } else {
            return redirect("cms/user")->withErrors('User not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SignupRequest $request, $id) {
        if (User::updateUser($request, $id)) {
            Session::flash('ms', "User data is updated");
            return redirect('cms/user');
        } else {
            return redirect("cms/user")->withErrors('something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        User::destroy($id);
        Session::flash('ms', "user is deleted");
        return redirect('cms/user');
    }

}
