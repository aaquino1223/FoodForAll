<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location', function(Blueprint $table)
		{
			$table->integer('LocationId', true);
			$table->string('LocationName', 20)->nullable();
			$table->string('BuildingNumber', 10)->nullable();
			$table->string('Street', 50)->nullable();
			$table->string('Apt', 5)->nullable();
			$table->string('City', 50)->nullable();
			$table->string('State', 50)->nullable();
			$table->string('Zip', 10)->nullable();
			$table->decimal('Latitude', 10, 8);
			$table->decimal('Longitude', 11, 8);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('location');
	}

}
