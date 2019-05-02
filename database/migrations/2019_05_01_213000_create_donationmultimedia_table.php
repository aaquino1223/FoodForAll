<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationmultimediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donationmultimedia', function(Blueprint $table)
		{
			$table->integer('DonationId');
			$table->integer('MultiMediaId')->index('MultiMediaId');
			$table->primary(['DonationId','MultiMediaId']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donationmultimedia');
	}

}
