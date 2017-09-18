<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClimaticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_climatic')->create('climatics', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('station_id')->unsigned()->index();
            $table->string('station_ref')->index();
            $table->dateTime('climatic_date');
            $table->decimal('climatic_precipIntensity', 6, 2)->nullable()->comment('Millimeters per hour');
            $table->decimal('climatic_temperature', 4, 2)->nullable()->comment('Degrees Celsius for average temperature');
            $table->decimal('climatic_temperatureMin', 4, 2)->nullable()->comment('Degrees Celsius');
            $table->time('climatic_temperatureMinHour')->nullable()->comment('Temperature time');
            $table->decimal('climatic_temperatureMax', 4, 2)->nullable()->comment('Degrees Celsius');
            $table->time('climatic_temperatureMaxHour')->nullable()->comment('Temperature time');
            $table->decimal('climatic_windSpeed', 6, 2)->nullable()->comment('Kilometers/hour');
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
        Schema::connection('mysql_climatic')->drop('climatics');
    }
}
