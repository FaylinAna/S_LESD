<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('REP',3)->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('rol');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('Id_User')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructor');
    }
}
