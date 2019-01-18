<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\AddMenuRequest;
use App\Order;
use App\Statuse;
use Session;

class OrderController extends MainController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= "CMS orders";
        self::$data['inner_title'] = "Orders";
        self::$data['orders'] = Order::all()->toArray();
        self::$data['statuses'] = Statuse::all()->toArray();
        //echo "<pre>";print_r(Order::all()->toArray());die;
        return view('cms.showAllOrders', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= "Add order manually";
        self::$data['inner_title'] = "Add order";
        return view('cms.addOrder', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        /* admin cannot add order manually */
            return redirect("cms/order")->withErrors('something went wrong');
        /*}*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Order::find($id)) {
            self::$data['order_id'] = $id;
            self::$data['title'] .= 'Delete order';
            self::$data['inner_title'] = 'Delete order';
            return view("cms/deleteOrder", self::$data);
        } else {
            return redirect('cms/order')->withErrors('Order not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Order::find($id)) {
            self::$data['order'] = Order::find($id)->toArray();
            self::$data['statuses'] = Statuse::all();
            self::$data['title'] .= 'Update order';
            self::$data['inner_title'] = 'Update order';
            return view('cms/updateOrder', self::$data);
        } else {
            return redirect('cms/order')->withErrors('Order not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* updating order status in CMS */
    public function update(Request $request, $id) {
        if (Order::updateOrder($request, $id)) {
            Session::flash('ms', "Order is updated");
            return redirect('cms/order');
        } else {
            return redirect("cms/order")->withErrors('something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Order::destroy($id);
        Session::flash('ms', "order is deleted");
        return redirect('cms/order');
    }

}
