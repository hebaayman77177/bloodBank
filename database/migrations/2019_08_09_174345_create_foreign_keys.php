<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('article_client', function(Blueprint $table) {
			$table->foreign('article_id')->references('id')->on('articles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('article_client', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('article_category', function(Blueprint $table) {
			$table->foreign('article_id')->references('id')->on('articles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('article_category', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_blood_type_id_foreign');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_governorate_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_blood_type_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_governorate_id_foreign');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->dropForeign('contacts_client_id_foreign');
		});
		Schema::table('article_client', function(Blueprint $table) {
			$table->dropForeign('article_client_article_id_foreign');
		});
		Schema::table('article_client', function(Blueprint $table) {
			$table->dropForeign('article_client_client_id_foreign');
		});
		Schema::table('article_category', function(Blueprint $table) {
			$table->dropForeign('article_category_article_id_foreign');
		});
		Schema::table('article_category', function(Blueprint $table) {
			$table->dropForeign('article_category_category_id_foreign');
		});
	}
}