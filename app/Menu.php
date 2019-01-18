<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    
    /* add a new menu from CMS */
    static public function addMenu($request) {
        $menu = new self();
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->save();
        if ($menu->id) {
            return true;
        }
        return false;
    }

    
    /* update the menu item in CMS */
    static public function updateMenu($request, $id) {
        $menu = self::find($id);
        
        /* change if the menu item will be shown on client side or not; "show item" checkbox in CMS*/
        if ($request->show_item) {
            $menu->show_item = '1';
        } else {
            $menu->show_item = '0';
        }
        $menu->title = $request->title;
        $menu->url = $request->url;
        $menu->save();
        if ($menu->id) {
            return true;
        }
        return false;
    }

}
