<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('professionals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('position_title');
			$table->string('location');
			$table->string('time_period');
			$table->text('description');
			$table->date('created_at');
			$table->date('updated_at');
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
		Schema::drop('professionals');
	}

}
