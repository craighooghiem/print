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
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('salutation');
			$table->string('fname');
			$table->string('lname');
			$table->string('company_name')->nullable();
			$table->string('email');
			$table->string('street_no');
			$table->string('address');
			$table->string('postal');
			$table->string('city');
			$table->string('province');
			$table->string('telephone');
			$table->timestamps();
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
