<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardingHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardinghouses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->text('description');
            $table->text('address');
            $table->bigInteger('village_id')->unsigned();
            $table->foreign('village_id')->references('id')->on('villages');
            $table->string('facility');
            $table->string('facility_other');
            $table->string('access');
            $table->string('information_others');
            $table->string('information_cost');               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boarding_houses');
    }
}
