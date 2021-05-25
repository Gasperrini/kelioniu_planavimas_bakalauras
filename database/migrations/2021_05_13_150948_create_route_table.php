<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('route_code')->index();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->string('start_point');
            $table->string('end_point');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('url');
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
        Schema::dropIfExists('route');
    }
}
