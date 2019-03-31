<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamberUserTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chamber_user_tag', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('chamber_id')->unsigned()->nullable();
            $table->foreign('chamber_id')->references('id')->on('chambers')->onDelete('cascade');
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
        Schema::table('chamber_user_tag', function (Blueprint $table) {
            Schema::dropIfExists('chamber_user_tag');
        });
    }
}
