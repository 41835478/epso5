<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('stored_file')->default('default.jpg');
            $table->string('profile_address')->nullable();
            $table->date('profile_birthdate')->nullable();
            $table->string('profile_city', 150)->nullable();
            $table->string('profile_country', 150)->nullable();
            $table->string('profile_region', 150)->nullable();
            $table->string('profile_social_facebook', 150)->nullable();
            $table->string('profile_social_google', 150)->nullable();
            $table->string('profile_social_linkedin', 150)->nullable();
            $table->string('profile_social_twitter', 150)->nullable();
            $table->string('profile_state', 150)->nullable();
            $table->string('profile_telephone', 150)->nullable();
            $table->string('profile_url')->nullable();
            $table->string('profile_zip', 20)->nullable();
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
        Schema::drop('profiles');
    }
}
