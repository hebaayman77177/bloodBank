<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleCategoryTable extends Migration {

	public function up()
	{
		Schema::create('article_category', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('article_id')->unsigned();
			$table->integer('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('article_category');
	}
}