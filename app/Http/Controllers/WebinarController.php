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
    }

	public function index() {
	    
	    $channels =  Channel::all();
	    $channels_list = $channels->pluck('name', 'id');
	     
        return view('webinar.index', compact('channels_list'));
    }
    
    public function webinarList($id) {
        
        $webinars = Webinar::where('channel_id', $id)->get();
        
        return view('webinar.list', compact('webinars'));
        
    }
    
    public function webinar($id) {
        
        $webinar = Webinar::find($id);
        
        return view('webinar.show', compact('webinar'));
        
    }
}
