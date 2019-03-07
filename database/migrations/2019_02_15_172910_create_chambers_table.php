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
            $table->timestamps();
            $table->string('name');
            $table->integer('boardinghouse_id')->unsigned();
            $table->foreign('boardinghouse_id')
                ->references('id')->on('boardinghouses')
                ->onDelete('cascade');
            $table->integer('price_monthly')->unsigned();
            $table->integer('price_annual')->unsigned();
            $table->boolean('gender');
            $table->string('chamber_size');
            $table->string('chamber_facility');                        
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
