<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('anoCurso',9);
            $table->string('nivel', 15);
            $table->string('curso', 15);
            $table->unsignedBigInteger('asignatura_id');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('profesore_id');
            $table->integer('refuerzo');
            $table->integer('instrumento2');
            $table->integer('principal');
            $table->integer('libre');
            $table->date('fechaBaja');
            $table->string('causaBaja', 255);
            $table->string('eva1', 255);
            $table->string('obs1',255);
            $table->string('eva2', 255);
            $table->string('obs2', 255);
            $table->string('eva3', 255);
            $table->string('obs3', 255);
            $table->string('notaFinal', 255);
            $table->string('obsNotaFinal', 255);

            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('profesore_id')->references('id')->on('profesores');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
}
