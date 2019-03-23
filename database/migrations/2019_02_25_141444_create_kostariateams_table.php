<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKostariateamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kostariateams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();  
            $table->bigInteger('nik')->unsigned();
            $table->integer('regency_id_birth')->unsigned();
            $table->foreign('regency_id_birth')->references('id')->on('regencies')
                  ->onUpdate('cascade');
            $table->date('birth_date');
            $table->text('address');
            $table->bigInteger('village_id')->unsigned();
            $table->foreign('village_id')->references('id')->on('villages')->onUpdate('cascade');
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
        Schema::dropIfExists('kostariateams');
    }
}
