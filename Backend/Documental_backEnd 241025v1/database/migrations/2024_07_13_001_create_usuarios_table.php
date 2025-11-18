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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('ci', 20)->unique();
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('telefono', 15);
            $table->string('correo', 100)->unique();
            $table->string('password');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // Insertar usuarios por defecto
        DB::table('usuarios')->insert([
            [
                'ci' => '1214131112',
                'id_rol' => 1,
                'nombre' => 'Administrador',
                'apellido' => 'Servidor',
                'telefono' => '77777777',
                'correo' => 'admin',
                'password' => '123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '12345678',
                'id_rol' => 1,
                'nombre' => 'Julian',
                'apellido' => 'Perez',
                'telefono' => '123456789',
                'correo' => 'julian.perez@gmail.com',
                'password' => 'password123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '87654321',
                'id_rol' => 2,
                'nombre' => 'Regulos',
                'apellido' => 'Corneas',
                'telefono' => '9876534321',
                'correo' => 'regulos.corneas@gmail.com',
                'password' => 'userpassword',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '123632262',
                'id_rol' => 1,
                'nombre' => 'Emilia',
                'apellido' => 'Pinto',
                'telefono' => '123246789',
                'correo' => 'emilia.pinto@gmail.com',
                'password' => 'password123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '87785421',
                'id_rol' => 2,
                'nombre' => 'Melissa',
                'apellido' => 'Sahonero',
                'telefono' => '987654321',
                'correo' => 'melisa.sahonero@gmail.com',
                'password' => 'userpassword',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '11111111',
                'id_rol' => 2,
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'telefono' => '123456780',
                'correo' => 'juan.perez@gmail.com',
                'password' => 'password111',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '22222222',
                'id_rol' => 2,
                'nombre' => 'Maria',
                'apellido' => 'Lopez',
                'telefono' => '123456781',
                'correo' => 'maria.lopez@gmail.com',
                'password' => 'password222',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '33333333',
                'id_rol' => 3,
                'nombre' => 'Carlos',
                'apellido' => 'Gomez',
                'telefono' => '123456782',
                'correo' => 'carlos.gomez@gmail.com',
                'password' => 'password333',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '44444444',
                'id_rol' => 3,
                'nombre' => 'Laura',
                'apellido' => 'Martinez',
                'telefono' => '123456783',
                'correo' => 'laura.martinez@gmail.com',
                'password' => 'password444',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '55555555',
                'id_rol' => 2,
                'nombre' => 'Diego',
                'apellido' => 'Fernandez',
                'telefono' => '123456784',
                'correo' => 'diego.fernandez@gmail.com',
                'password' => 'password555',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '66666666',
                'id_rol' => 2,
                'nombre' => 'Ana',
                'apellido' => 'Rodriguez',
                'telefono' => '123456785',
                'correo' => 'ana.rodriguez@gmail.com',
                'password' => 'password666',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '77777777',
                'id_rol' => 2,
                'nombre' => 'Luis',
                'apellido' => 'Hernandez',
                'telefono' => '123456786',
                'correo' => 'luis.hernandez@gmail.com',
                'password' => 'password777',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '88888888',
                'id_rol' => 3,
                'nombre' => 'Sofia',
                'apellido' => 'Garcia',
                'telefono' => '123456787',
                'correo' => 'sofia.garcia@gmail.com',
                'password' => 'password888',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '99999999',
                'id_rol' => 3,
                'nombre' => 'Ricardo',
                'apellido' => 'Castro',
                'telefono' => '123456788',
                'correo' => 'ricardo.castro@gmail.com',
                'password' => 'password999',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '10101010',
                'id_rol' => 3,
                'nombre' => 'Valeria',
                'apellido' => 'Ortiz',
                'telefono' => '1234567890',
                'correo' => 'valeria.ortiz@gmail.com',
                'password' => 'password1010',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '12121212',
                'id_rol' => 2,
                'nombre' => 'Miguel',
                'apellido' => 'Dominguez',
                'telefono' => '1234567811',
                'correo' => 'miguel.dominguez@gmail.com',
                'password' => 'password1212',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '13131313',
                'id_rol' => 3,
                'nombre' => 'Esteban',
                'apellido' => 'Vargas',
                'telefono' => '1234567812',
                'correo' => 'esteban.vargas@gmail.com',
                'password' => 'password1313',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '14141414',
                'id_rol' => 2,
                'nombre' => 'Gabriela',
                'apellido' => 'Diaz',
                'telefono' => '1234567813',
                'correo' => 'gabriela.diaz@gmail.com',
                'password' => 'password1414',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '15151515',
                'id_rol' => 3,
                'nombre' => 'Paula',
                'apellido' => 'Salazar',
                'telefono' => '1234567814',
                'correo' => 'paula.salazar@gmail.com',
                'password' => 'password1515',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '16161616',
                'id_rol' => 2,
                'nombre' => 'Oscar',
                'apellido' => 'Rios',
                'telefono' => '1234567815',
                'correo' => 'oscar.rios@gmail.com',
                'password' => 'password1616',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '17171717',
                'id_rol' => 3,
                'nombre' => 'Andrea',
                'apellido' => 'Mendoza',
                'telefono' => '1234567816',
                'correo' => 'andrea.mendoza@gmail.com',
                'password' => 'password1717',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '18181818',
                'id_rol' => 2,
                'nombre' => 'Ignacio',
                'apellido' => 'Morales',
                'telefono' => '1234567817',
                'correo' => 'ignacio.morales@gmail.com',
                'password' => 'password1818',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '19191919',
                'id_rol' => 2,
                'nombre' => 'Juliana',
                'apellido' => 'Nuñez',
                'telefono' => '1234567818',
                'correo' => 'juliana.nunez@gmail.com',
                'password' => 'password1919',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
