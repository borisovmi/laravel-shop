<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Message;

class CmsController extends MainController {

    public function ShowDashboard() {
        self::$data['title'] .= "CMS dashboard";
        self::$data['inner_title'] = "Overview";
        self::$data['orders'] = count(Order::all()->toArray());
        self::$data['users'] = count(User::all()->toArray());
        self::$data['messages'] = count(Message::all()->toArray());
        return view('cms.dashboard', self::$data);
    }

    /* show all orders for one user in CMS */
    public function getUserOrders($user_id) {
        if (User::find($user_id)) {
            self::$data['title'] .= "user's orders";
            self::$data['inner_title'] = "User's orders";
            $orders = Order::getOrdersByUser($user_id);
            self::$data['orders'] = $orders->toArray();
            self::$data['user_name'] = User::find($user_id)->first_name;
            return view("cms.showUserOrders", self::$data);
        } else {
            return redirect("cms/user")->withErrors('User not found');
        }
    }

    /* show order details in CMS: */
    public function getOrder($user_id, $order_id) {
        if (User::find($user_id) && Order::find($order_id)) {
            self::$data['title'] .= " order details";
            self::$data['inner_title'] = "Orders details";
            $order = Order::getOrderById($order_id);
            self::$data['order'] = $order->toArray();
            self::$data['totalPrice'] = 0;
            self::$data['totalQuantity'] = 0;
            return view("cms.showOrder", self::$data);
        } else {
            return redirect("cms/dashboard")->withErrors('User or order not found');
        }
    }

}
