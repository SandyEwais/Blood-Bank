<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->string('patient_name');
			$table->string('hospital_name');
			$table->integer('city_id')->unsigned();
			$table->smallInteger('patient_age');
			$table->smallInteger('blood_bags');
			$table->string('governorate_id');
			$table->string('patient_phone');
			$table->mediumText('details')->nullable();
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->integer('client_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}