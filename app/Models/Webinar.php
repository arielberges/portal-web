<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model {
	
    protected $table = 'webinars';
    
    protected $fillable = ['code','title','thumbnail','channel_id','start_time','end_time'];

    public function start_time_for_view() {
        return $this->start_time ? date_format(date_create($this->start_time), 'd/m/Y h:i A') : null;
    }
    
    public function end_time_for_view() {
        return $this->end_time ? date_format(date_create($this->end_time), 'd/m/Y h:i A') : null;
    }
    
    public function users() {
        return $this->belongsToMany('App\User','webinars_authors');
    }
    
    public function channel() {
        return $this->belongsTo('App\Models\Channel');
    }
}
