<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use App\Categorie;
use Session;

class CategoryController extends MainController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['categories'] = Categorie::all()->toArray();
        self::$data['title'] .= "CMS category";
        self::$data['inner_title'] = "Categories";
        return view('cms.showCategories', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= "Add category";
        self::$data['inner_title'] = "Add category";
        return view('cms.addCategory', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request) {
        if (Categorie::addCategory($request)) {
            Session::flash('ms', "Category is added");
            return redirect('cms/category');
        } else {
            return redirect("cms/category")->withErrors('something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Categorie::find($id)) {
            self::$data['post_id'] = $id;
            self::$data['title'] .= 'Delete category';
            self::$data['inner_title'] = 'Delete category';
            return view("cms/deleteCategory", self::$data);
        } else {
            return redirect('cms/category')->withErrors('Category not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Categorie::find($id)) {
            self::$data['category'] = Categorie::find($id)->toArray();
            self::$data['title'] .= 'Update category';
            self::$data['inner_title'] = 'Update category';
            return view('cms/updateCategory', self::$data);
        } else {
            return redirect('cms/category')->withErrors('Category not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddCategoryRequest $request, $id) {
        if (Categorie::updateCategory($request, $id)) {
            Session::flash('ms', "Category is updated");
            return redirect('cms/category');
        } else {
            return redirect("cms/category")->withErrors('something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Categorie::destroy($id);
        Session::flash('ms', "category is deleted");
        return redirect('cms/category');
    }

}
