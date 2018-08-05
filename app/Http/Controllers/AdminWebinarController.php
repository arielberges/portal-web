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

class AdminWebinarController extends Controller {

	public function __construct() {
        //$this->middleware('admin');
	    view()->share('current_screen', ADMIN_WEBINAR_SCREEN);
    }

	public function index() {
	    $webinars = Webinar::all();
    	 
        return view('admin.webinar.index', compact('webinars'));
    }
    
    public function edit($id = null) {
    	$webinar = new Webinar();
    	if($id) {
    	    $webinar = Webinar::find($id);
    	}
    	
    	$channels =  Channel::all();
    	$channels_list = $channels->pluck('name', 'id');
    	
    	$users = User::all();
    	$user_ids = $webinar->users->pluck('id');
    	$users = $users->pluck('name', 'id');
    	
    	return view('admin.webinar.edit', compact('webinar','channels_list', 'users', 'user_ids'));
    }
    
    public function postEdit($id = null) {
    	
    	$rules = array(
    			'title' => 'required',
        	    'code' => 'required|unique:webinars,code,'.$id,
        	    'thumbnail' => 'required',
        	    'channel_id' => 'required',
        	    'start_time' => 'required'
    	);
    
    	$validation = Validator::make(Request::all(), $rules);
    	if($validation->fails()) {
    		return redirect()->back()->withInput()->withErrors($validation);
    	}
    	
    	if($id) {
    		$webinar = Webinar::find($id);
    	} else {
    		$webinar =  new Webinar();
    	}

    	$webinar->title = Request::input('title');
    	$webinar->code = Request::input('code');
    	$webinar->thumbnail = Request::input('thumbnail');
    	$webinar->channel_id = Request::input('channel_id');
    	$webinar->start_time = Request::input('start_time');
    	$webinar->end_time = Request::input('end_time');
    	
    	$webinar->start_time = DateTime::createFromFormat('d/m/Y h:i A', Request::input('start_time'))->format('Y-m-d H:i:s');
    	
    	$end_time = null;
    	if(Request::input('end_time')) {
    	    $end_time = DateTime::createFromFormat('d/m/Y h:i A', Request::input('end_time'))->format('Y-m-d H:i:s');
    	}
    	$webinar->end_time = $end_time;
    	
    	$webinar->save();
    	
    	$users = array();
    	$user_ids = Request::input("user_ids");
    	if($user_ids && count($user_ids) > 0) {
    	    $users = User::whereIn('id', $user_ids)->get();
    	}
    	$webinar->users()->sync($users);
    	
    	return redirect('/admin/webinar')->with('message', 'Webinar "' . $webinar->title . '" was successfully saved');
    }
    
    public function delete($id) {
    	$webinar = Webinar::find($id);
    	Webinar::destroy($id);
    	return redirect('/admin/webinar')->with('message', 'Webinar "' . $webinar->name . '" was successfully deleted');
    }
}
