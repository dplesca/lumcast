<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodcastsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('podcasts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 100);
			$table->text('description');
			$table->string('url', 150);
			$table->string('image', 150);
			$table->dateTime('last_build_date');
			$table->boolean('active');
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
		Schema::drop('podcasts');
	}

}
