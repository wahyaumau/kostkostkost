<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniversityIdToBoardinghouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boardinghouses', function (Blueprint $table) {
            $table->integer('university_id')->unsigned()->nullable()->after('village_id');
            $table->foreign('university_id')->references('id')->on('universities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boardinghouses', function (Blueprint $table) {
            $table->dropColumn('university_id');
        });
    }
}
