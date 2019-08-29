<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->smallInteger('age');
			$table->integer('blood_type_id')->unsigned();
			$table->smallInteger('num_of_bags');
			$table->string('hospital_name');
			$table->decimal('latitudes');
			$table->decimal('longitude');
			$table->integer('governorate_id')->unsigned();
			$table->integer('phone');
			$table->text('notes')->nullable();
			// $table->index('blood_type_id');
			// $table->index('governorate_id');
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}