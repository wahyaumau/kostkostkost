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
            $table->bigInteger('nik')->unsigned();
            $table->integer('regency_id_birth')->unsigned();
            $table->foreign('regency_id_birth')
                ->references('id')->on('regencies')
                ->onDelete('cascade');
            $table->date('birth_date');
            $table->text('address');
            $table->integer('regency_id')->unsigned();
            $table->foreign('regency_id')
                ->references('id')->on('regencies')
                ->onDelete('cascade');
            $table->string('phone');
            $table->rememberToken();  
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
