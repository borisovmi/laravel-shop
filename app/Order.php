<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use Cart;
use Illuminate\Support\Facades\DB;

class Order extends Model {

    
    /* save an order in DB after clicking on checkout button */
    static public function SaveOrder() {
        $order = new self();
        $order->uid = Session::get('user_id');
        $order->total = 0;
        foreach (Cart::getContent()->toArray() as $item) {
            $order->total += $item['price'] * $item['quantity'];
        }
        $order->order_data = serialize(Cart::getContent()->toArray());
        $order->status = "New";
        $order->save();
        $order_id = DB::table('orders')->latest()->first()->id;
        /* saving order_id in session, used to redirect the user to order details page on user page after submitting checkout */
        Session::put('last_order', $order_id);
        /* clear cart, ready for a new order */
        Cart::clear();
        return true;
    }   

    
    /* updating only order status: payed, delivered, etc */
    static public function updateOrder($request, $id) {
        $order = self::find($id);
        $order->status = $request->status;
        $order->save();
        if ($order->id) {
            return true;
        }
        return false;
    }

    
    /* get all user's order to show in CMS and also on user's personal page */
    static public function getOrdersByUser($user_id) {
        $userOrders = DB::table('orders')->where('uid', $user_id)->get();
        return $userOrders;
    }

    /* get order detailsn to show in CMS and also on user's personal page */
    static public function getOrderById($order_id) {
        $order = DB::table('orders')->where('id', $order_id)->get();
        return $order;
    }

}
