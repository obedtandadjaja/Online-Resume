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
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamps();
			$table->string('occupation')->nullable();
            $table->string('focus')->nullable();
			$table->smallInteger('age')->nullable();
			$table->string('religion')->nullable();
			$table->string('degree')->nullable();
			$table->string('nationality')->nullable();
			$table->string('ethnicity')->nullable();
			$table->string('language')->nullable();
			$table->text('summary')->nullable();
			$table->text('imageUri')->nullable();
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
