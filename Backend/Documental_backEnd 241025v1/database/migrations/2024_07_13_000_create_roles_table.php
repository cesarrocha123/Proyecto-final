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
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_rol'); // Primary key
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->engine = 'InnoDB';
        });

        DB::table('roles')->insert([
            [
                'nombre' => 'Admin',
                'descripcion' => 'Administrador con todos los privilegios',
            ],
            [
                'nombre' => 'Tecnico 1',
                'descripcion' => 'Responsable de Planificacion Estrategica Operativa',
            ],
            [
                'nombre' => 'Tecnico 2',
                'descripcion' => 'Responsable de Urbanismo y Catastrofe',
            ],
            [
                'nombre' => 'Tecnico 3',
                'descripcion' => 'Responsable de Ordenamiento territorial',
            ],
            [
                'nombre' => 'Tecnico 4',
                'descripcion' => 'Responsable Geodesica y Topografo',
            ],
            [
                'nombre' => 'Tecnico 5',
                'descripcion' => 'Directora de Planificacion y Urbanismo',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
