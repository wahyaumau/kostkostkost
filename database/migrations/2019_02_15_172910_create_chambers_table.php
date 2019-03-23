<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChambersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('boardinghouse_id')->unsigned();
            $table->foreign('boardinghouse_id')
                ->references('id')->on('boardinghouses');
            $table->bigInteger('price_monthly');
            $table->bigInteger('price_annual');
            $table->boolean('gender');
            $table->string('chamber_size');
            $table->string('chamber_facility');                        
            $table->string('chamber_facility_others');                        
            $table->timestamps();
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
        Schema::dropIfExists('chambers');
    }
}
