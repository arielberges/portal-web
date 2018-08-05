<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Support\Facades\Input;
use Log;
use Excel;
use Validator;
use Request;
use Auth;

class AdminChannelController extends Controller {

	public function __construct() {
        //$this->middleware('admin');
	    view()->share('current_screen', ADMIN_CHANNEL_SCREEN);
    }

	public function index() {
	    $channels = Channel::all();
    	 
        return view('admin.channel.index', compact('channels'));
    }
    
    public function edit($id = null) {
    	$channel = new Channel();
    	if($id) {
    	    $channel = Channel::find($id);
    	}
    
    	return view('admin.channel.edit', compact('channel'));
    }
    
    public function postEdit($id = null) {
    	
    	$rules = array(
    			'name' => 'required',
    			'code' => 'required|unique:channels,code,'.$id
    	);
    
    	$validation = Validator::make(Request::all(), $rules);
    	if($validation->fails()) {
    		return redirect()->back()->withInput()->withErrors($validation);
    	}
    	
    	if($id) {
    		$channel = Channel::find($id);
    	} else {
    		$channel =  new Channel();
    	}

    	$channel->name = Request::input('name');
    	$channel->code = Request::input('code');
    	$channel->save();
    	
    	return redirect('/admin/channel')->with('message', 'Channel "' . $channel->name . '" was successfully saved');
    }
    
    public function delete($id) {
    	$channel = Channel::find($id);
    	Channel::destroy($id);
    	return redirect('/admin/channel')->with('message', 'Channel "' . $channel->name . '" was successfully deleted');
    }
}
