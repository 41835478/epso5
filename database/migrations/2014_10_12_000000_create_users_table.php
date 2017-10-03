<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('locale', 2)->default('es');
            $table->integer('client_id')->unsigned();
            $table->boolean('tools')->default(false);
            $table->boolean('is_god')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_editor')->default(false);
            $table->boolean('is_user')->default(true);
            $table->ipAddress('agreement')->nullable();   
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
