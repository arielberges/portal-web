<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebinarAuthor extends Model {
	
    protected $table = 'webinars_authors';
    
    protected $fillable = ['user_id','webinar_id'];

}
