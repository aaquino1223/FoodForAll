<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostreactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postreaction', function(Blueprint $table)
		{
			$table->integer('PostId');
			$table->integer('ReactionId')->index('ReactionId');
			$table->primary(['PostId','ReactionId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('postreaction');
	}

}
