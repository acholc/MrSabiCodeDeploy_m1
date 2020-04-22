<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDaysTimeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('days_time', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('listing_id');
			$table->string('day')->nullable();
			$table->string('opening_hour')->nullable();
			$table->string('closing_hour')->nullable();
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
		Schema::drop('days_time');
	}

}
