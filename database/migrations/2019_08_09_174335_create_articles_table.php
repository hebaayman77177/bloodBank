<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('header');
			$table->text('content');
			$table->string('img_path');
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}