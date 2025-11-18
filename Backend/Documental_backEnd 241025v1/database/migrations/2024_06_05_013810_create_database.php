<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear la base de datos si no existe
        DB::statement('CREATE DATABASE IF NOT EXISTS santi');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar la base de datos si la migración se deshace
        DB::statement('DROP DATABASE IF EXISTS  santi');
    }
};
