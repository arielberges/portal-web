<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Models\Channel;
use App\User;
use Illuminate\Support\Facades\Input;
use Log;
use Excel;
use Validator;
use Request;
use Auth;
use DateTime;

class WebinarController extends Controller {

	public function __construct() {
        //$this->middleware('admin');
	    view()->share('current_screen', ADMIN_WEBINAR_SCREEN);
    }

	public function index() {
	     
        return view('webinar.index', compact('webinars'));
    }
    
}
