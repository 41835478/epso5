<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgronomicHarvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agronomic_harvests', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->integer('plot_id')->unsigned()->index();
            $table->integer('crop_id')->unsigned()->index();
            $table->date('agronomic_date')->comment("Date of application");
            $table->integer('agronomic_quantity')->nullable()->comment("Quantity of product");
            $table->integer('agronomic_quantity_unit')->unsigned()->nullable();
            $table->integer('agronomic_quantity_ha')->nullable()->comment("Kg/ha");
            $table->decimal('agronomic_baume', 8, 2)->nullable();
            $table->decimal('agronomic_baume_kg', 8, 2)->nullable()->comment("total kg * baume º");;
            $table->decimal('agronomic_ph', 4, 2)->nullable();
            $table->decimal('agronomic_acidity', 8, 2)->nullable();
            $table->decimal('agronomic_poliphenol', 8, 2)->nullable();
            $table->decimal('agronomic_anthocyanin_total', 8, 2)->nullable();
            $table->decimal('agronomic_anthocyanin_removable', 8, 2)->nullable();
            $table->string('agronomic_color')->nullable();
            $table->text('agronomic_observations')->nullable();
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
        Schema::dropIfExists('agronomic_harvests');
    }
}