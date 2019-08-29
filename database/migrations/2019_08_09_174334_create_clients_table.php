<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('password');
			$table->string('email')->unique();
			$table->date('date_of_birth');
			$table->integer('blood_type_id')->unsigned();
			$table->date('date_of_last_donation')->nullable();
			$table->integer('city_id')->unsigned();
			$table->integer('phone');
			$table->string('code')->nullable();
			$table->mediumInteger('num_unreaded_notifications')->default(0);
			$table->string('api_token',80)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}