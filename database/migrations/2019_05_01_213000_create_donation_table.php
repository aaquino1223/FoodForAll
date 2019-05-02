<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donation', function(Blueprint $table)
		{
			$table->integer('DonationId', true);
			$table->integer('PostId')->index('PostId');
			$table->string('ItemDescription', 100);
			$table->integer('Quantity');
			$table->string('Measure', 20)->nullable();
			$table->boolean('IsDonated')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donation');
	}

}
