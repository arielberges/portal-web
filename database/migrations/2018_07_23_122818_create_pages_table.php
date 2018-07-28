<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	public function up() {
		Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('url',32)->unique();
            $table->timestamps();
        });
	}

	public function down() {
		Schema::drop('pages');
	}

}