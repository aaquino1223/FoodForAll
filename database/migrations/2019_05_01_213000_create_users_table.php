<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('UserId', true);
			$table->string('UserName', 50);
			$table->string('Password', 30);
			$table->date('DateOfBirth')->nullable();
			$table->string('Email', 50);
			$table->boolean('IsOrganization')->nullable();
			$table->dateTime('InsertedDate');
			$table->dateTime('LastUpdatedDate')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
