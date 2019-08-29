<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigsTable extends Migration {

	public function up()
	{
		Schema::create('configs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('android_app_url');
			$table->string('fb');
			$table->string('twitter');
			$table->string('inst');
			$table->string('whats');
			$table->string('google');
			$table->integer('phone');
			$table->text('about');
			$table->text('home');
			$table->text('notification_config');
		});
	}

	public function down()
	{
		Schema::drop('configs');
	}
}