<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMultimediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('multimedia', function(Blueprint $table)
		{
			$table->integer('MultiMediaId', true);
			$table->binary('Media', 65535);
			$table->integer('MultiMediaTypeId')->index('MultiMediaTypeId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('multimedia');
	}

}
