<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();;
            $table->string('clave',10)->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('rol');
            $table->unsignedInteger('id_user'); 
            $table->foreign('id_user')->references('Id_User')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Alumno');
    }
}
