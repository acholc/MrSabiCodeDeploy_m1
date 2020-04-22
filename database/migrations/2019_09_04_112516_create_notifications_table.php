<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->integer('commented_id')->nullable();
			$table->integer('reviewed_id')->nullable();
			$table->integer('added_list_id')->nullable();
			$table->integer('edited_list_id')->nullable();
			$table->integer('type')->comment('1 for registration, 2 for forgot password, 3 for added new listing, 4 for edited lisitng');
			$table->integer('seen')->default(0);
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
		Schema::drop('notifications');
	}

}
