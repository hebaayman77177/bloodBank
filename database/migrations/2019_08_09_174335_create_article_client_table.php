<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleClientTable extends Migration {

	public function up()
	{
		Schema::create('article_client', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('article_id')->unsigned();
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('article_client');
	}
}