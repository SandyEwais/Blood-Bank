<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleClientTable extends Migration {

	public function up()
	{
		Schema::create('article_client', function(Blueprint $table) {
			$table->integer('client_id')->unsigned();
			$table->integer('article_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('article_client');
	}
}