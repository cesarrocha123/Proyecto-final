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
        Schema::create('tramite_etapas', function (Blueprint $table) {
            $table->id('id_etapa');  // Clave primaria
            $table->string('hoja_ruta', 100);
            $table->string('nombre', 100);
            $table->unsignedInteger('numero_etapa');
            $table->enum('estado', ['Pendiente', 'Completado', 'En Progreso'])->default('Pendiente');
            $table->string('comentario', 255)->nullable();
            $table->dateTime('fecha')->nullable();

            // Relación con la tabla tramites
            $table->foreign('hoja_ruta')
                  ->references('hoja_ruta')
                  ->on('tramites')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramite_etapas');
    }
};
