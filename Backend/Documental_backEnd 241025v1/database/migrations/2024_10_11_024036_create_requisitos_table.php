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
        Schema::create('requisitos', function (Blueprint $table) {
            $table->id('id_requisito');
            $table->string('hoja_ruta', 100);
            $table->string('Descripcion', 255)->nullable();
            $table->enum('estado', ['Pendiente', 'Completado'])->default('Pendiente');
            // Relación con la tabla tramites
            $table->foreign('hoja_ruta')
                  ->references('hoja_ruta')
                  ->on('tramites')
                  ->onDelete('cascade');

            $table->engine = 'InnoDB';

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitos');
    }
};
