<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdaphologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edaphologies', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('plot_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->integer('crop_id')->unsigned()->index();
            $table->integer('edaphology_level')->default(1)->comment('1 for primary sample. 2 for secundary sample');
            $table->decimal('edaphology_lat', 10, 6)->nullable();
            $table->decimal('edaphology_lng', 10, 6)->nullable();
            $table->string('edaphology_name')->nullable()->comment('If the sample was taken from a specific place...');
            $table->string('edaphology_reference', 50)->nullable()->comment('If we need an internal reference or something...');
            $table->text('edaphology_observations')->nullable();
            $table->integer('edaphology_aggregate_stability')->unsigned()->default(0)->comment('Aggregate stability in %');
            $table->integer('edaphology_coarse_elements')->unsigned()->default(0)->comment('Coarse elements in %');
            $table->integer('edaphology_sand')->unsigned()->default(0)->comment('Sand in %');
            $table->integer('edaphology_silt')->unsigned()->default(0)->comment('Silt in %');
            $table->integer('edaphology_clay')->unsigned()->default(0)->comment('Clay in %');
            $table->integer('edaphology_ph')->unsigned()->default(0)->comment('Just the pH');
            $table->integer('edaphology_electric_conductivity')->unsigned()->default(0)->comment('Electric conductivity in dS/m');
            $table->integer('edaphology_calcium_carbonate_equivalent')->unsigned()->default(0)->comment('Calcium carbonate equivalent in %');
            $table->integer('edaphology_active_lime')->unsigned()->default(0)->comment('Active lime (caliza activa) %');
            $table->integer('edaphology_total_organic_matter')->unsigned()->default(0)->comment('Organic matter in %');
            $table->integer('edaphology_organic_carbon')->unsigned()->default(0)->comment('Organic carbon in %');
            $table->integer('edaphology_cation_exchange')->unsigned()->default(0)->comment('Cation exchange in CIC');
            $table->string('edaphology_texture')->nullable();
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
        Schema::dropIfExists('edaphologies');
    }
}