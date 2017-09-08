<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeolocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geolocations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('plot_id')->unsigned()->index();
            $table->decimal('geo_lat', 10, 6);
            $table->decimal('geo_lng', 10, 6);
            $table->decimal('geo_x', 10, 6)->nullable();
            $table->decimal('geo_y', 10, 6)->nullable();
            $table->string('geo_bbox', 30)->nullable();
            $table->string('geo_sigpac_region', 10)->nullable();
            $table->string('geo_sigpac_city', 10)->nullable();
            $table->string('geo_sigpac_aggregate', 10)->nullable();
            $table->string('geo_sigpac_zone', 10)->nullable();
            $table->string('geo_sigpac_polygon', 10)->nullable();
            $table->string('geo_sigpac_plot', 10)->nullable();
            $table->string('geo_sigpac_precinct', 10)->nullable();
            $table->string('geo_catastro', 30)->nullable();
            $table->string('geo_zip', 10)->nullable();
            $table->decimal('geo_height', 6, 2)->nullable();
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
        Schema::drop('geolocations');
    }
}
