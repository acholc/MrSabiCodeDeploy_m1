<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191)->nullable();
			$table->string('lastname')->nullable();
			$table->string('email', 191)->unique();
			$table->string('password', 191);
			$table->string('phone')->nullable();
			$table->string('profile_image')->default('default-profile-picture-gmail-2.png');
			$table->integer('active')->default(0)->comment('1 for admin, 0 for users');
			$table->integer('status')->default(1)->comment('1 for active, 2 for disable, 3 for deleted');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
