<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateViewrestrictiontypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('viewrestrictiontype', function(Blueprint $table)
		{
			$table->integer('ViewRestrictionTypeId', true);
			$table->string('Description', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('viewrestrictiontype');
	}

}
