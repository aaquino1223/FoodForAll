<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostmultimediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postmultimedia', function(Blueprint $table)
		{
			$table->integer('PostId');
			$table->integer('MultiMediaId')->index('MultiMediaId');
			$table->primary(['PostId','MultiMediaId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('postmultimedia');
	}

}
