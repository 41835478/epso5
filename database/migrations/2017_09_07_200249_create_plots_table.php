<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('client_id')->unsigned()->index();
            $table->integer('crop_id')->unsigned()->index();
            $table->string('crop_module', 20);
            $table->integer('crop_variety_id')->unsigned()->index();
            $table->integer('pattern_id')->unsigned()->index();
            $table->integer('city_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->integer('region_id')->unsigned()->index();
            $table->integer('state_id')->unsigned()->index();
            $table->integer('user_id')->nullable()->comment("We need can add the user later...");
            $table->integer('climatic_station_id')->unsigned()->index();
            $table->decimal('climatic_station_distance', 12, 2);
            $table->string('plot_name');
            $table->integer('plot_quantity')->nullable()->comment("The total number of crops");
            $table->string('plot_crop_type', 3)->comment("In the grape case: 0/1 white or red");
            $table->string('plot_reference', 50)->nullable()->comment("Internal Reference of the Plot");
            $table->string('plot_framework', 6)->comment("Framework planting: 0x0");
            $table->decimal('plot_area', 12, 2);
            $table->string('plot_green_cover', 1);
            $table->integer('plot_training')->unsigned();
            $table->string('plot_percent_cultivated_land', 3)->default(100)->comment("Percentage of cultivated land without deciamals");
            $table->date('plot_start_date')->nullable()->comment("Crops planting date");
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
        Schema::dropIfExists('plots');
    }
}