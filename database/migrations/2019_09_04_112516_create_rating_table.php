<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rating', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('user_id');
			$table->string('listing_id');
			$table->string('name');
			$table->string('email');
			$table->string('website')->nullable();
			$table->string('comment')->nullable();
			$table->string('rating')->nullable();
			$table->integer('status')->default(1);
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
		Schema::drop('rating');
	}

}
