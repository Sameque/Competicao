<?php

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
//            $table->increments('id');
//            $table->string('name');
//            $table->string('password');
//            $table->string('email');
            $table->integer('accessLevel');
            $table->string('cpf');
            $table->string('rg');
            $table->integer('yearCourse');
            $table->date('birthDate');
            $table->boolean('graduated');
//            $table->rememberToken();
//            $table->string('username');
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
        Schema::drop('users');
    }
}
