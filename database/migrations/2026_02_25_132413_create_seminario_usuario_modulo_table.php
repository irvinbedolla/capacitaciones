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
        Schema::create('modulo_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('seminario_id');
            $table->unsignedBigInteger('modulo_id');
            $table->integer('aciertos')->nullable();
            $table->integer('total_preguntas')->default(0);
            $table->integer('intentos')->default(0);
            $table->decimal('calificacion', 5, 2)->nullable();
            $table->enum('estatus', ['pendiente', 'completado'])->default('pendiente');
            $table->timestamps();
            $table->unique(['user_id', 'seminario_id', 'modulo_id'], 'unique_user_sem_mod');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulo_usuario');
    }
};
