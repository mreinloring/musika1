<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string ('nombre');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('email');
            $table->string('telefono');
            $table->string('dni');
            $table->string('numSS');
            $table->string('fechaNto');
            $table->string('fechaAlta');
            $table->string('fechaBaja');
            $table->string('image');
            $table->string('iban');
            $table->string('calle');
            $table->string('numero');
            $table->string('piso');
            $table->string('codigoPostal');
            $table->string('poblacion');
            $table->string('provincia');

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
        Schema::dropIfExists('profesores');
    }
}
