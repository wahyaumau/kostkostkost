<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVideoColumnToBoardinghouses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boardinghouses', function (Blueprint $table) {
            $table->string('video')->nullable()->after('information_cost');
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
            $table->dropColumn('video');
        });
    }
}
