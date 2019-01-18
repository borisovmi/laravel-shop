<?php

namespace App;

use Cart;
use Session;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    
    /* add product to cart from shop */
    public static function addToCart($product_id) {
        $product = self::where('id', '=', $product_id)->get();
        $product = $product->toArray();
        Cart::add($product_id, $product[0]['title'], $product[0]['price'], 1, array());
        Session::flash('ms', "{$product[0]['title']} added to cart!");
    }

    /* changing product quantity on checkout page */
    static public function updateCart($request) {
        $valid = false;
        
        if ($request->product_id && is_numeric($request->product_id)) {
            $id = $request->product_id;
            /* $request->op: value of an input incr/decr button on checkout page*/
            if ($request->op) {
                $op = $request->op == '+' ? 1 : -1;
                $product = Cart::get($id);
                if ($product['quantity'] == 1 && $op == -1)
                    return FALSE;

                Cart::update($id, array('quantity' => $op));
                $valid = true;
            }
        }
        return $valid;
    }

    
    /* add a new product from CMS */
    static public function addProduct($request) {
        /* check product image */
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . "-" . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . "/images", $filename);
            
            $product = new self();
            $product->categorie_id = $request->categorie_id;
            $product->title = $request->title;
            $product->article = $request->article;
            $product->image = $filename;
            $product->url = $request->url;
            $product->price = $request->price;
            $product->save();
            if ($product->id) {
                return TRUE;
            } else {
                return false;
            }
        }
    }

    
    /* update product details from CMS */
    static public function updateProduct($request, $id) {
        $product = self::find($id);
        $product->categorie_id = $request->categorie_id;
        $product->title = $request->title;
        $product->article = $request->article;
        /* check product image if changed - will be updated */
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . "-" . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . "/images", $filename);
            $product->image = $filename;
        }
        $product->url = $request->url;
        $product->price = $request->price;
        $product->save();
        if ($product->id) {
            return TRUE;
        } else {
            return false;
        }
    }

}
