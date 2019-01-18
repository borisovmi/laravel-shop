<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Product;
use App\Categorie;
use Session;

class ProductController extends MainController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= "CMS product";
        self::$data['inner_title'] = "products";
        self::$data['products'] = Product::all()->toArray();
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.showProduct', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= "Add product";
        self::$data['inner_title'] = "Add product";
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.addProduct', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request) {
        if (Product::addProduct($request)) {
            Session::flash('ms', "Product is added");
            return redirect('cms/product');
        } else {
            return redirect("cms/product")->withErrors('something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Product::find($id)) {
            self::$data['post_id'] = $id;
            self::$data['title'] .= 'Delete product';
            self::$data['inner_title'] = 'Delete product';
            return view("cms/deleteProduct", self::$data);
        } else {
            return redirect('cms/product')->withErrors('Product not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Product::find($id)) {
            self::$data['product'] = Product::find($id)->toArray();
            self::$data['categories'] = Categorie::all()->toArray();
            self::$data['title'] .= 'Update product';
            self::$data['inner_title'] = 'Update product';
            return view('cms/updateProduct', self::$data);
        } else {
            return redirect('cms/product')->withErrors('Product not found');
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
        if (Product::updateProduct($request, $id)) {
            Session::flash('ms', "Product is updated");
            return redirect('cms/product');
        } else {
            return redirect("cms/product")->withErrors('something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Product::destroy($id);
        Session::flash('ms', "product is deleted");
        return redirect('cms/product');
    }

}
