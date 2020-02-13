<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language')->nullable();
            $table->integer('attitude')->nullable();
            $table->integer('workflow')->nullable();
            $table->integer('learning')->nullable();
            $table->integer('meteo')->nullable();
            $table->string('scope')->nullable();
            $table->bigInteger('course_catalog_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('filled')->default(false);
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
        Schema::dropIfExists('self_evaluations');
    }
}
