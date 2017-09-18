<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClimaticStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * Request::getClientIp();
     */
    public function up()
    {
        Schema::connection('mysql_climatic')->create('climatic_stations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('station_reference', 10)->unique();
            $table->string('station_reference_by_city', 10)->unique()->nullable();
            $table->string('station_name');
            $table->string('station_city_name');
            $table->string('station_region_name');
            $table->decimal('station_height', 4, 2)->default(0);
            $table->decimal('station_lat', 10, 6);
            $table->decimal('station_lng', 10, 6);
            $table->softDeletes();
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
        Schema::connection('mysql_climatic')->drop('climatic_stations');
    }
}
