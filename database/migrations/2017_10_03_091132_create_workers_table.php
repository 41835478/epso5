<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->string('worker_name');
            $table->string('worker_nif', 15)->nullable();
            $table->string('worker_ropo')->nullable()->comment("Carnet Number / ROPO");
            $table->integer('worker_ropo_level')->nullable()->comment("Carnet ROPO level");
            $table->date('worker_ropo_date')->nullable()->comment("The accreditation date / mostly 10 years vality");
            $table->date('worker_start')->nullable()->comment("Start working in the company at...");
            $table->text('worker_observations')->nullable()->comment("Comments about the worker.");
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
        Schema::dropIfExists('workers');
    }
}