<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsermultimediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usermultimedia', function(Blueprint $table)
		{
			$table->integer('UserId')->index('UserId');
			$table->integer('MultimediaId')->index('MultimediaId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usermultimedia');
	}

}
