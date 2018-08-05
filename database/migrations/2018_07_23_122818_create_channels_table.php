<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration {

	public function up() {
		Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->text('name');
            $table->timestamps();
        });
	}

	public function down() {
		Schema::drop('channels');
	}

}