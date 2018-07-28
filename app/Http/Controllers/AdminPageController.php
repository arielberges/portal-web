<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Facades\Input;
use Log;
use Excel;
use Validator;
use Request;
use Auth;

class AdminPageController extends Controller {

	public function __construct() {
        //$this->middleware('admin');
        view()->share('current_screen', ADMIN_SCREEN);
    }

	public function index() {
	    $pages = Page::all();
    	 
        return view('admin.page.index', compact('pages'));
    }
    
    public function edit($id = null) {
    	$page = new Page();
    	if($id) {
    		$page = Page::find($id);
    	}
    
    	return view('admin.page.edit', compact('page'));
    }
    
    public function postEdit($id = null) {
    	
    	$rules = array(
    			'title' => 'required',
    			'description' => 'required',
    			'url' => 'required|unique:pages,url,'.$id
    	);
    
    	$validation = Validator::make(Request::all(), $rules);
    	if($validation->fails()) {
    		return redirect()->back()->withInput()->withErrors($validation);
    	}
    	
    	if($id) {
    		$page = Page::find($id);
    	} else {
    		$page =  new Page();
    	}

    	$page->title = Request::input('title');
    	$page->description = Request::input('description');
    	$page->url = Request::input('url');
    	$page->save();
    	
    	return redirect('/admin/page')->with('message', 'Page "' . $page->title . '" was successfully saved');
    }
    
    public function delete($id) {
    	$page = Page::find($id);
    	Page::destroy($id);
    	return redirect('/admin/page')->with('message', 'Page "' . $page->title . '" was successfully deleted');
    }
}
