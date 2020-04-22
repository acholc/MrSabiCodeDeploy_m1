<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->string('title');
			$table->string('category_id');
			$table->string('description')->nullable();
			$table->string('tags')->nullable();
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('mail');
			$table->string('pincode')->nullable();
			$table->string('website')->nullable();
			$table->string('country_id')->nullable();
			$table->string('state_id')->nullable();
			$table->string('city')->nullable();
			$table->string('status')->default('1');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('listings');
	}

}
