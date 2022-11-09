<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('image');
			$table->longText('content');
			$table->integer('category_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}