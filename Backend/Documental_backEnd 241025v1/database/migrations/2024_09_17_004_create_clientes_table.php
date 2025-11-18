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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('ci', 20)->unique();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('telefono', 20)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('correo', 100)->unique();
            $table->string('password');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        // Insertar usuarios por defecto
        DB::table('clientes')->insert([
            [
                'ci' => '12345678',
                'nombre' => 'Julian',
                'apellido' => 'Perez',
                'telefono' => '123456789',
                'direccion'=> 'Av. Suecia',
                'correo' => 'julian.perez@gmail.com',
                'password' => 'password123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '87654321',
                'nombre' => 'Regulos',
                'apellido' => 'Corneas',
                'telefono' => '9876534321',
                'direccion'=> 'Av. Suecia',
                'correo' => 'regulos.corneas@gmail.com',
                'password' => 'userpassword',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '123632262',
                'nombre' => 'Emilia',
                'apellido' => 'Pinto',
                'telefono' => '123246789',
                'direccion'=> 'Av. Suecia',
                'correo' => 'emilia.pinto@gmail.com',
                'password' => 'password123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '87785421',
                'nombre' => 'Melissa',
                'apellido' => 'Sahonero',
                'telefono' => '987654321',
                'direccion'=> 'Av. Suecia',
                'correo' => 'melisa.sahonero@gmail.com',
                'password' => 'userpassword',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '11111111',
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'telefono' => '123456780',
                'direccion'=> 'Av. Suecia',
                'correo' => 'juan.perez@gmail.com',
                'password' => 'password111',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '22222222',
                'nombre' => 'Maria',
                'apellido' => 'Lopez',
                'telefono' => '123456781',
                'direccion'=> 'Av. Suecia',
                'correo' => 'maria.lopez@gmail.com',
                'password' => 'password222',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '33333333',
                'nombre' => 'Carlos',
                'apellido' => 'Gomez',
                'telefono' => '123456782',
                'direccion'=> 'Av. Suecia',
                'correo' => 'carlos.gomez@gmail.com',
                'password' => 'password333',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '44444444',
                'nombre' => 'Laura',
                'apellido' => 'Martinez',
                'telefono' => '123456783',
                'direccion'=> 'Av. Suecia',
                'correo' => 'laura.martinez@gmail.com',
                'password' => 'password444',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '55555555',
                'nombre' => 'Diego',
                'apellido' => 'Fernandez',
                'telefono' => '123456784',
                'direccion'=> 'Av. Suecia',
                'correo' => 'diego.fernandez@gmail.com',
                'password' => 'password555',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '66666666',
                'nombre' => 'Ana',
                'apellido' => 'Rodriguez',
                'telefono' => '123456785',
                'direccion'=> 'Av. Suecia',
                'correo' => 'ana.rodriguez@gmail.com',
                'password' => 'password666',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '77777777',
                'nombre' => 'Luis',
                'apellido' => 'Hernandez',
                'telefono' => '123456786',
                'direccion'=> 'Av. Suecia',
                'correo' => 'luis.hernandez@gmail.com',
                'password' => 'password777',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '88888888',
                'nombre' => 'Sofia',
                'apellido' => 'Garcia',
                'telefono' => '123456787',
                'direccion'=> 'Av. Suecia',
                'correo' => 'sofia.garcia@gmail.com',
                'password' => 'password888',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '99999999',
                'nombre' => 'Ricardo',
                'apellido' => 'Castro',
                'telefono' => '123456788',
                'direccion'=> 'Av. Suecia',
                'correo' => 'ricardo.castro@gmail.com',
                'password' => 'password999',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '10101010',
                'nombre' => 'Valeria',
                'apellido' => 'Ortiz',
                'telefono' => '1234567890',
                'direccion'=> 'Av. Suecia',
                'correo' => 'valeria.ortiz@gmail.com',
                'password' => 'password1010',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '12121212',
                'nombre' => 'Miguel',
                'apellido' => 'Dominguez',
                'telefono' => '1234567811',
                'direccion'=> 'Av. Suecia',
                'correo' => 'miguel.dominguez@gmail.com',
                'password' => 'password1212',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '13131313',
                'nombre' => 'Esteban',
                'apellido' => 'Vargas',
                'telefono' => '1234567812',
                'direccion'=> 'Av. Suecia',
                'correo' => 'esteban.vargas@gmail.com',
                'password' => 'password1313',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '14141414',
                'nombre' => 'Gabriela',
                'apellido' => 'Diaz',
                'telefono' => '1234567813',
                'direccion'=> 'Av. Suecia',
                'correo' => 'gabriela.diaz@gmail.com',
                'password' => 'password1414',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '15151515',
                'nombre' => 'Paula',
                'apellido' => 'Salazar',
                'telefono' => '1234567814',
                'direccion'=> 'Av. Suecia',
                'correo' => 'paula.salazar@gmail.com',
                'password' => 'password1515',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '16161616',
                'nombre' => 'Oscar',
                'apellido' => 'Rios',
                'telefono' => '1234567815',
                'direccion'=> 'Av. Suecia',
                'correo' => 'oscar.rios@gmail.com',
                'password' => 'password1616',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '17171717',
                'nombre' => 'Andrea',
                'apellido' => 'Mendoza',
                'telefono' => '1234567816',
                'direccion'=> 'Av. Suecia',
                'correo' => 'andrea.mendoza@gmail.com',
                'password' => 'password1717',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '18181818',
                'nombre' => 'Ignacio',
                'apellido' => 'Morales',
                'telefono' => '1234567817',
                'direccion'=> 'Av. Suecia',
                'correo' => 'ignacio.morales@gmail.com',
                'password' => 'password1818',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ci' => '19191919',
                'nombre' => 'Juliana',
                'apellido' => 'Nuñez',
                'telefono' => '1234567818',
                'direccion'=> 'Av. Suecia',
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
        Schema::dropIfExists('clientes');
    }
};
