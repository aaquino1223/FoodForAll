<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssociateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('associate', function(Blueprint $table)
		{
			$table->integer('RequesterId');
			$table->integer('RecipientId');
			$table->integer('AssociateTypeId')->index('AssociateTypeId');
			$table->dateTime('RequestedDate');
			$table->dateTime('AcceptedDate')->nullable();
			$table->boolean('Accepted')->nullable();
			$table->primary(['RequesterId','RecipientId','AssociateTypeId','RequestedDate']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('associate');
	}

}
