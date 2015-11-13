<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('location');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
			$table->timestamps();
		});

		Schema::create('image_professional', function(Blueprint $table)
		{
			$table->integer('professional_id')->unsigned()->index();
			$table->foreign('professional_id')->references('id')->on('professionals')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('image_id')->unsigned()->index();
			$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::create('image_volunteer', function(Blueprint $table)
		{
			$table->integer('volunteer_id')->unsigned()->index();
			$table->foreign('volunteer_id')->references('id')->on('volunteers')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('image_id')->unsigned()->index();
			$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::create('image_project', function(Blueprint $table)
		{
			$table->integer('project_id')->unsigned()->index();
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('image_id')->unsigned()->index();
			$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::create('feat_image', function(Blueprint $table)
		{
			$table->integer('feat_id')->unsigned()->index();
			$table->foreign('feat_id')->references('id')->on('feats')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('image_id')->unsigned()->index();
			$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::create('image_user', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('image_id')->unsigned()->index();
			$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('image_professional');
		Schema::drop('image_project');
		Schema::drop('image_volunteer');
		Schema::drop('image_user');
		Schema::drop('feat_image');
		Schema::drop('images');
	}

}
