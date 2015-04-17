<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('episodes', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('podcast_id');
			$table->string('title', 100);
			$table->text('description');
			$table->integer('duration');
			$table->string('mp3_url', 150);
			$table->dateTime('pub_date');
			$table->boolean('fetched');
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
		Schema::drop('episodes');
	}

}
