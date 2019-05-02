<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserpostcommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userpostcomment', function(Blueprint $table)
		{
			$table->integer('UserId');
			$table->integer('PostId')->index('PostId');
			$table->integer('CommentId')->index('CommentId');
			$table->primary(['UserId','PostId','CommentId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userpostcomment');
	}

}
