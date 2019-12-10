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
            $table->unsignedBigInteger('id');
            $table->integer('language');
            $table->integer('attitude');
            $table->integer('participation');
            $table->integer('learning');
            $table->integer('collaboration');
            $table->integer('meteo');
            $table->unsignedBigInteger('user_id');
            $table->boolean('review_status')->default(false);
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
