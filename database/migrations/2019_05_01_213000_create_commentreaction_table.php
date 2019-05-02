<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentreactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commentreaction', function(Blueprint $table)
		{
			$table->integer('CommentId');
			$table->integer('ReactionId')->index('ReactionId');
			$table->primary(['CommentId','ReactionId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('commentreaction');
	}

}
