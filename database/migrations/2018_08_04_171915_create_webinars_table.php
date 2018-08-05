<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebinarsTable extends Migration {

	public function up() {
		Schema::create('webinars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('title');
            $table->text('thumbnail');
            $table->integer('channel_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->timestamps();
        });
		
	    Schema::create('webinars_authors', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('user_id');
	        $table->integer('webinar_id');
	    });
	}

	public function down() {
	    Schema::drop('webinars_authors');
	    Schema::drop('webinars');
	}

}