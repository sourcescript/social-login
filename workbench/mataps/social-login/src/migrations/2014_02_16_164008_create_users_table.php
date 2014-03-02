<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('username')->index();
			$table->string('email')->index();
			$table->string('password')->index();
			$table->text('permissions');
			$table->timestamp('verified_at');
            $table->string('verification_code');
            $table->string('reset_code');
            $table->text('user_info');
            $table->timestamps();
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
