<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemSolvedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_solved_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('problem');
            $table->integer('user_repository_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_repository_id')->references('id')->on('user_repositories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('problem_solved_users');
    }
}
