<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMouTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mou', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('regency_id')->unsigned();
            $table->foreign('regency_id')
                ->references('id')->on('regencies')
                ->onDelete('cascade');            
            $table->integer('kostariateam_id')->unsigned();
            $table->foreign('kostariateam_id')
                ->references('id')->on('kostariateams');            
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')
                ->references('id')->on('owners')
                ->onUpdate('cascade');
            $table->timestamps();
            $table->date('signed_at');
            $table->date('ended_at');
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
        Schema::dropIfExists('mou');
    }
}
