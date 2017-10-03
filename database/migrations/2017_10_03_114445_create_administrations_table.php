<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('administration_app_name');
            $table->string('administration_app_version');
            $table->string('administration_app_url');
            $table->string('administration_app_owner_name');
            $table->string('administration_app_owner_address');
            $table->string('administration_app_owner_phone');
            $table->string('administration_app_owner_nif');
            $table->string('administration_app_owner_zip');
            $table->string('administration_app_owner_city');
            $table->string('administration_app_owner_region');
            $table->string('administration_app_owner_state');
            $table->string('administration_app_owner_country');
            $table->string('administration_hosting_name');
            $table->string('administration_hosting_address');
            $table->string('administration_hosting_email');
            $table->string('administration_hosting_url');
            $table->string('administration_hosting_nif');
            $table->string('administration_hosting_zip');
            $table->string('administration_hosting_city');
            $table->string('administration_hosting_region');
            $table->string('administration_hosting_state');
            $table->string('administration_hosting_country');
            $table->string('administration_hosting_conditions_url');
            $table->string('administration_hosting_register');
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
        Schema::dropIfExists('administrations');
    }
}