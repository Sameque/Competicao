<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToSubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submission', function (Blueprint $table) {
            $table->integer('problem_id')->unsigned();

            $table->foreign('problem_id')->references('id')->on('problems');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submission', function (Blueprint $table) {
            $table->dropForeign(['problem_id']);
        });
    }
}
