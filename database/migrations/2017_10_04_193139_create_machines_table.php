<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('client_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('equipment_id')->nullable()->unsigned()->index()->comment('Just in case we want to use a DB for this');
            $table->string('machine_equipment_name', 150);
            $table->string('machine_brand', 150)->nullable();
            $table->string('machine_model', 150)->nullable();
            $table->date('machine_date')->nullable()->comment('Machine purchase');
            $table->date('machine_inspection')->nullable()->comment('Last machine inspection');
            $table->integer('machine_next_inspection')->default(0)->unsigned()->comment('In days. Use $carbon->addDays($days);');
            $table->text('machine_observations')->nullable()->comment("Comments about the machine.");
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
        Schema::dropIfExists('machines');
    }
}