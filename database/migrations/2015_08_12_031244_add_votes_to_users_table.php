<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
//            $table->dropColumn('ra');
//            $table->dropColumn('yearBeginning');
            //tive que dar up date na tabela de migration
            $table->string('email');
            $table->string('cpf');
            $table->string('rg');
            $table->integer('yearCourse');
            $table->date('birthDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('cpf');
            $table->dropColumn('rg');
            $table->dropColumn('yearCourse');
            $table->dropColumn('birthDate');
        });
    }
}
