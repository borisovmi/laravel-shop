<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddContentRequest;
use App\Content;
use Session;

class ContentController extends MainController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= "CMS content";
        self::$data['inner_title'] = "Content";
        self::$data['contents'] = Content::all()->toArray();
        return view('cms.showContent', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= "Add content";
        self::$data['inner_title'] = "Add content";
        return view('cms.addContent', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddContentRequest $request) {
        if (Content::addContent($request)) {
            Session::flash('ms', "Content is added");
            return redirect('cms/content');
        } else {
            return redirect("cms/content")->withErrors('something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Content::find($id)) {
            self::$data['post_id'] = $id;
            self::$data['title'] .= 'Delete content';
            self::$data['inner_title'] = 'Delete content';
            return view("cms/deleteContent", self::$data);
        } else {
            return redirect('cms/content')->withErrors('Content not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Content::find($id)) {
            self::$data['content'] = Content::find($id)->toArray();
            self::$data['title'] .= 'Update content';
            self::$data['inner_title'] = 'Update content';
            return view('cms/updateContent', self::$data);
        } else {
            return redirect('cms/content')->withErrors('Content not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddContentRequest $request, $id) {
        if (Content::updateContent($request, $id)) {
            Session::flash('ms', "Content is updated");
            return redirect('cms/content');
        } else {
            return redirect("cms/content")->withErrors('something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Content::destroy($id);
        Session::flash('ms', "content is deleted");
        return redirect('cms/content');
    }

}
