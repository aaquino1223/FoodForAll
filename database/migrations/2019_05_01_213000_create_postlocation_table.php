<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostlocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postlocation', function(Blueprint $table)
		{
			$table->integer('PostId');
			$table->integer('LocationId')->index('LocationId');
			$table->primary(['PostId','LocationId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('postlocation');
	}

}
