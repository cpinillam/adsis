<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('attendances', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users');
		});

		Schema::table('evaluations', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	public function down()
	{

	}
}
