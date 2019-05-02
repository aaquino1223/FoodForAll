<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reaction', function(Blueprint $table)
		{
			$table->integer('ReactionId', true);
			$table->integer('UserId')->index('UserId');
			$table->integer('ReactionTypeId')->index('ReactionTypeId');
			$table->dateTime('ReactionDate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reaction');
	}

}
