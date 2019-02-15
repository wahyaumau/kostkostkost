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
        Schema::create('boarding_houses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');            
            $table->text('description');
            $table->text('address');
            $table->integer('regency_id')->unsigned();
            $table->foreign('regency_id')
                ->references('id')->on('regencies')
                ->onDelete('cascade');
            $table->string('owner_name');
            $table->string('owner_phone');
            $table->string('facility');
            $table->string('facility_park');
            $table->string('access');
            $table->string('information_others');
            $table->string('information_cost');            
            $table->softDeletes();
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
