<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Categorie extends Model {
    /* defining the relations between Product and Categorie DBs */

    public function products() {
        return $this->hasMany('App\Product');
    }

    
    /* get the products from the relevant category */
    static public function getProducts($cat_url, &$data) {
        $cat = Categorie::where("url", $cat_url)->first();
        if ($cat) {
            $cat = $cat->toArray();
            $products = Product::where('categorie_id', '=', $cat['id'])->paginate(3);
            if (Product::where('categorie_id', '=', $cat['id'])->first()) {
                $data['products'] = $products;
            } else {
                $data['products'] = [];
            }
            $data['title'] .= $cat['title'];
            $data['cat_title'] = $cat['title'];
            $data['cat_url'] = $cat['url'];
        } else {
            abort(404);
        }
    }

    /* add a new category to DB from CMS */
    static public function addCategory($request) {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . "-" . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . "/images", $filename);
            $category = new self();
            $category->title = $request->title;
            $category->article = $request->article;
            $category->url = $request->url;
            $category->image = $filename;
            $category->save();
            if ($category->id) {
                return TRUE;
            } else {
                return false;
            }
        }
    }

    /* update the category ino DB from CMS */
    static public function updateCategory($request, $id) {
        $category = self::find($id);
        $category->title = $request->title;
        $category->article = $request->article;
        $category->url = $request->url;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . "-" . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . "/images", $filename);
            $category->image = $filename;
        }
        $category->save();
        if ($category->id) {
            return TRUE;
        } else {
            return false;
        }
    }

}
