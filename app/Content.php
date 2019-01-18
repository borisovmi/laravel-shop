<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Content extends Model {

    /* get content for relevant menu to show on page */
    public static function getContent($page_url) {
        $content = DB::table('menus')
                ->join('contents', function ($join) use ($page_url) {
                    $join->on('menus.id', '=', 'contents.menu_id')
                    ->where('menus.url', '=', $page_url);
                })
                ->get();
        $content = $content->toArray();
        return $content;
    }

    
    /* add a new content item from CMS */
    public static function addContent($request) {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . "-" . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . "/images", $filename);
            $content = new self();
            $content->menu_id = $request->menu_id;
            $content->heading = $request->title;
            $content->image = $filename;
            $content->data = $request->data;
            $content->bookmark = $request->bookmark;
            $content->save();
            if ($content->id) {
                return TRUE;
            } else {
                return false;
            }
        }
    }

    
    /* update the content item from CMS */
    public static function updateContent($request, $id) {        
        $content = self::find($id);
        $content->menu_id = $request->menu_id;
        $content->heading = $request->title;        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . "-" . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . "/images", $filename);
            $content->image = $filename;
        } 
        $content->data = $request->data;
        $content->bookmark = $request->bookmark;
        $content->save();
        if ($content->id) {
            return true;
        }
        return false;
    }

}
