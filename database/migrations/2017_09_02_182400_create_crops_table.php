<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('crop_name');
            $table->string('crop_description')->nullable();
            $table->string('crop_module', 20);
            $table->string('crop_type', 1)->default(0)->comment('This is for grape and vineyard: red or white, but can use in other crop if like... Disabled by default');
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
        Schema::dropIfExists('crops');
    }
}