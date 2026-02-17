<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('cargo');
            $table->string('area_adcripcion');
            $table->string('telefono');
            $table->text('estudio_maximo');
            $table->text('tilulo_universitario');
            $table->text('especialidades');
            $table->text('diplomados');
            $table->text('seminarios');
            $table->text('cursos');
            $table->text('acciones_desarrollo');
            $table->text('observaciones');
            $table->enum('estatus',['Aceptado','Rechazado','Pendiente']);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
