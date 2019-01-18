<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;
use App\Order;
use Illuminate\Support\Collection;

class ShopController extends MainController {

    
    /* add to cart button method */
    public function addToCart(Request $request) {
        Product::addToCart($request->product_id);
    }

    
    /* get checkout page */
    public function getCheckout($sortType = 'name') {
        $cart = Cart::getContent();
        self::$data['title'] .= ' Checkout';
        /* sort the products in order according to sort button href */
        $sorted = $cart->sortBy(function ($product, $key) use ($sortType) {
            if ($sortType == 'total') {
                return ($product['price'] * $product['quantity']);
            } else if (array_has($product, $sortType)) {
                return ($product[$sortType]);
            } else {
                return redirect('shop/checkout')->withErrors("something went wrong");
            }
        });

        self::$data['items'] = $sorted->toArray();

        return view("content.checkout", self::$data);
    }

    /* delete all products from cart */
    public function clearCart() {
        Cart::clear();
        Session::flash('ms', "Cart is empty");
        return redirect("shop/checkout");
    }

    /* delete a product from order before checkout */
    public function deleteProduct($product_id) {
        Cart::remove($product_id);
        Session::flash('ms', "Product is deleted");
        return redirect('shop/checkout');
    }

    /* updating product quantity on checkout page */
    public function updateCart(Request $request) {
        if (Product::updateCart($request)) {
            Session::flash('ms', "Product updated on cart");
        } else {
            Session::flash('ms', "error");
        }
    }

    
    /* finish checkout, save order and redirrect to user's personal page and show the details or the order */
    public function SaveOrder() {
        if (Session::has('user_id')) {
            if (!Cart::isEmpty()) {
                if (Order::SaveOrder()) {
                    Session::flash('ms', 'Your order is saved! Our manager will contact you.');
                    $last_order = session('last_order');
                    return redirect('user/' . session('user_id') . "/orders/" . $last_order);
                }
            } else {
                return redirect('shop')->withErrors("Add products to complete an order");
            }
        } else {
            return redirect('user/signin')->withErrors("Log in to complete an order");
        }
    }

}
