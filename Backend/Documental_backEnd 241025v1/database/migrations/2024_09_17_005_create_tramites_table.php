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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id('id_tramite');
            $table->string('hoja_ruta', 100)->unique();
            $table->string('Referencia', 100)->nullable();
            $table->dateTime('fecha_ingreso');
            $table->dateTime('fecha_entrega')->nullable();

            // Agregamos la columna 'estado' que faltaba
            $table->enum('estado', ['Completado', 'En Progreso', 'Pendiente', 'Inicio'])->default('Pendiente');

            $table->string('ci_usuario', 20);
            $table->foreign('ci_usuario')
                  ->references('ci')
                  ->on('usuarios')
                  ->onDelete('cascade');

            $table->string('ci_cliente', 20);
            $table->foreign('ci_cliente')
                  ->references('ci')
                  ->on('clientes')
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
        Schema::dropIfExists('tramites');
    }
};
