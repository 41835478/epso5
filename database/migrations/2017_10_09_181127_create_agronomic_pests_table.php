<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgronomicPestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agronomic_pests', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->integer('plot_id')->unsigned()->index();
            $table->integer('crop_id')->unsigned()->index();
            $table->integer('pest_id')->unsigned()->index();
            $table->date('agronomic_date')->comment("Date of application");
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
        Schema::dropIfExists('agronomic_pests');
    }
}