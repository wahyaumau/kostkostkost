<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name');            
            $table->bigInteger('nik')->unsigned();
            $table->integer('regency_id_birth')->unsigned();
            $table->foreign('regency_id_birth')->references('id')->on('regencies');
            $table->date('birth_date');
            $table->text('address');
            $table->bigInteger('village_id')->unsigned();
            $table->foreign('village_id')->references('id')->on('villages');
            $table->string('phone');
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
        Schema::dropIfExists('owners');
    }
}
