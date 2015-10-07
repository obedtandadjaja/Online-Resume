<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('occupation');
			$table->string('issuer');
			$table->string('time_period');
			$table->text('description');
			$table->date('updated_at');
			$table->date('created_at');
			$table->text('imageUri');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('feats');
	}

}
