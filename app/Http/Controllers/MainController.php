<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Content;
use App\Product;
use App\Categorie;
use App\User;

class MainController extends Controller {

    static public $data = ['title' => 'myTeacher | '];

    public function __construct() {        
        // get menus for the navbar in the header:
        self::$data['menus'] = Menu::where('show_item', 1)->get();
        
        
        /*get data for sliders on the home page*/
        // get random reviews:
        self::$data['review_article'] = Content::where('menu_id', '10')->inRandomOrder()->limit(3)->get()->toArray();
        // get random articles from blog:
        self::$data['blog_article'] = Content::where('menu_id', '2')->inRandomOrder()->limit(3)->get()->toArray();
        // get random articles from about us:
        self::$data['about_article'] = Content::where('menu_id', '11')->inRandomOrder()->limit(3)->get()->toArray();
        // get random products:
        self::$data['product'] = Product::inRandomOrder()->limit(3)
                        ->crossJoin('categories', 'products.categorie_id', '=', 'categories.id')
                        ->select('products.title as title', 'products.url as url', 'products.image', 'categories.url as cat_url')
                        ->get()->toArray();
    }

}
