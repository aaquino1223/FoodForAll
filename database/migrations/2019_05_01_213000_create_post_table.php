<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table)
		{
			$table->integer('PostId', true);
			$table->integer('UserId')->index('UserId');
			$table->integer('PostTypeId')->index('PostTypeId');
			$table->string('Title', 50)->nullable();
			$table->string('Message', 500)->nullable();
			$table->dateTime('PostDate');
			$table->integer('ViewRestrictionTypeId')->nullable()->index('ViewRestrictionTypeId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post');
	}

}
