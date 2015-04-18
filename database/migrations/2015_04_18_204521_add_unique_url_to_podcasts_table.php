<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueUrlToPodcastsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('podcasts', function(Blueprint $table)
		{
			$table->unique('url');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('podcasts', function(Blueprint $table)
		{
			$table->dropUnique('users_url_unique');
		});
	}

}
