<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use App\Content;
use App\Menu;

class PagesController extends MainController {
    /* show home page */

    public function getHomePage() {
        self::$data['title'] .= "home";
        return view('content.home', self::$data);
    }

    /* show conts-us page */

    public function getContactUs() {
        self::$data['title'] .= "contact us";
        return view('content.contactus', self::$data);
    }

    /* show all categories */

    public function getCategories() {
        self::$data['title'] .= "shop";
        self::$data['categories'] = Categorie::all()->toArray();
        return view('content.shop', self::$data);
    }

    /* show all products in the categories: */

    public function getProducts($cat_url) {
        Categorie::getProducts($cat_url, self::$data);
        return view('content.products', self::$data);
    }

    
    /* show product details: */
    
    public function getItem($cat_url, $product_url) {
        $product = Product::where("url", $product_url)->first();
        $category = Categorie::where("url", $cat_url)->first();
        if ($product && $category) {
            $categories = Categorie::all();
            self::$data['item'] = $product->toArray();
            self::$data['category'] = $category->toArray();
            self::$data['categories'] = $categories->toArray();
            self::$data['title'] .= $product['title'];
            return view("content.item", self::$data);
        } else {
            return redirect('/shop')->withErrors("page not found");
        }
    }

    
    /* get page with any content: blog, about us, review or any other that can be created under some menu: */
    
    public function getPageByUrl($page_url) {

        if (!empty($content = Content::getContent($page_url))) {
            self::$data['title'] .= $content[0]->title;
            self::$data['content'] = $content;
            return view('content.content', self::$data);
        } else {
            return redirect('/')->withErrors("page not found");
        }
    }

}
