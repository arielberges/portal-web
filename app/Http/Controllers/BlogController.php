<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Facades\Input;
use Log;
use Excel;
use Validator;
use Request;
use Auth;

class BlogController extends Controller {

	public function __construct() {
        //$this->middleware('admin');
        //view()->share('current_screen', ADMIN_SCREEN);
    }

	public function blog($url = null) {
	    
    	if($url) {
    	    $page = Page::where('url', $url)->first();
    	}
    
    	return view('blog.index', compact('page'));
    }
}
