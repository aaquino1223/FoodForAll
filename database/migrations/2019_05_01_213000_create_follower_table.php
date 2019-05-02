<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('follower', function(Blueprint $table)
		{
			$table->integer('UserId');
			$table->integer('FollowerId')->index('FollowerId');
			$table->dateTime('FollowDate');
			$table->primary(['UserId','FollowerId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('follower');
	}

}
