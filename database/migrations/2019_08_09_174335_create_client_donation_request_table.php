<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientDonationRequestTable extends Migration {

	public function up()
	{
		Schema::create('client_donation_request', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id');
			$table->integer('donation_request_id');
			$table->boolean('readed')->default(TRUE);
		});
	}

	public function down()
	{
		Schema::drop('client_donation_request');
	}
}