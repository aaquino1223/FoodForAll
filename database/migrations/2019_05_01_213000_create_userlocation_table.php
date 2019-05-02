<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserlocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userlocation', function(Blueprint $table)
		{
			$table->integer('UserId');
			$table->integer('LocationId')->index('LocationId');
			$table->primary(['UserId','LocationId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userlocation');
	}

}
