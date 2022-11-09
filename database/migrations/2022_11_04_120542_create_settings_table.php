<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->longText('aboutus_text');
			$table->mediumText('notification_settings_text');
			$table->string('contact_phone');
			$table->string('contact_email');
			$table->string('fb_link');
			$table->string('insta_link');
			$table->string('youtube_link');
			$table->string('tw_link');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}