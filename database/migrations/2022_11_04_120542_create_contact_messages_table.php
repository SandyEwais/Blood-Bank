<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactMessagesTable extends Migration {

	public function up()
	{
		Schema::create('contact_messages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->mediumText('content');
			$table->integer('client_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contact_messages');
	}
}