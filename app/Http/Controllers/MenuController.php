<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddMenuRequest;
use App\Menu;
use Session;

class MenuController extends MainController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= "CMS menus";
        self::$data['inner_title'] = "Menus";
        self::$data['menus'] = Menu::all()->toArray();
        return view('cms.showMenu', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= "Add menu";
        self::$data['inner_title'] = "Add menu";
        return view('cms.addMenu', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddMenuRequest $request) {
        if (Menu::addMenu($request)) {
            Session::flash('ms', "Menu is added");
            return redirect('cms/menu');
        } else {
            return redirect("cms/menu")->withErrors('something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Menu::find($id)) {
            self::$data['post_id'] = $id;
            self::$data['title'] .= 'Delete menu';
            self::$data['inner_title'] = 'Delete menu';
            return view("cms/deleteMenu", self::$data);
        } else {
            return redirect('cms/menu')->withErrors('Menu not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Menu::find($id)) {
            self::$data['menu_data'] = Menu::find($id)->toArray();
            self::$data['title'] .= 'Update menu';
            self::$data['inner_title'] = 'Update menu';
            return view('cms/updateMenu', self::$data);
        } else {
            return redirect('cms/menu')->withErrors('Menu not found');
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
        if (Menu::updateMenu($request, $id)) {
            Session::flash('ms', "Menu is updated");
            return redirect('cms/menu');
        } else {
            return redirect("cms/menu")->withErrors('something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Menu::destroy($id);
        Session::flash('ms', "menu is deleted");
        return redirect('cms/menu');
    }

}
