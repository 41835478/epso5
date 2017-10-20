<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgronomicCulturalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agronomic_culturals', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->integer('plot_id')->unsigned()->index();
            $table->integer('crop_id')->unsigned()->index();
            $table->integer('agronomic_type')->comment("The cultural type");
            $table->date('agronomic_date')->comment("Date of application");
            $table->integer('agronomic_fertilizer_type')->comment("0 for inorganic y 1 for organic");
            $table->string('agronomic_fertilizer_name')->nullable()->comment("Fertilizer name or id (for organics)");
            $table->integer('agronomic_quantity')->nullable()->comment("Quantity of product");
            $table->integer('agronomic_quantity_unit')->unsigned()->nullable();
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
        Schema::dropIfExists('agronomic_culturals');
    }
}