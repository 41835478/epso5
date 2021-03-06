<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgronomicBiocidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agronomic_biocides', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->integer('plot_id')->unsigned()->index();
            $table->integer('crop_id')->unsigned()->index();
            $table->integer('biocide_id')->unsigned()->index();
            $table->integer('worker_id')->unsigned()->index()->nullable();
            $table->date('agronomic_date')->comment("Date of application");
            $table->integer('agronomic_quantity')->nullable()->comment("Quantity of product");
            $table->integer('agronomic_quantity_unit')->unsigned()->nullable();
            $table->integer('agronomic_biocide_secure')->unsigned()->nullable();
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
        Schema::dropIfExists('agronomic_biocides');
    }
}