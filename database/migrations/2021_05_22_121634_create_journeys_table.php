<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('slug');
            $table->string('start_point');
            $table->string('end_point');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('bus_file_name')->nullable();
            $table->string('bus_path')->nullable();
            $table->string('acc_file_name')->nullable();
            $table->string('acc_path')->nullable();
            $table->string('land_file_name')->nullable();
            $table->string('land_path')->nullable();
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
        Schema::dropIfExists('journeys');
    }
}
