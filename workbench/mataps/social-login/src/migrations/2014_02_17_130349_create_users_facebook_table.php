<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersFacebookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facebook_users', function($table) {
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('fb_id');
			$table->integer('user_id')->unsigned();
			$table->string('username');
			$table->string('first_name');
			$table->string('last_name');
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
		Schema::drop('facebook_users');
	}

}
