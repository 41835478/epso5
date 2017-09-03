<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiocidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biocides', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('biocide_num')->nullable()->comment("Nº from the national registration database (MAGRAMA)");
            $table->string('biocide_name')->nullable();
            $table->string('biocide_company')->nullable();
            $table->string('biocide_formula')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biocides');
    }
}