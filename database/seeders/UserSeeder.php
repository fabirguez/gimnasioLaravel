<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'Admin';
        $user->apellidos = 'admin';
        $user->email = 'admin@admin.es';
        $user->password = Hash::make('1234');
        $user->telefono = '666666666';
        $user->direccion = 'Aqui';
        $user->estado = 1;
        $user->rol_id = 0;
        $user->imagen = '-';

        $user->save();

        $user1 = new User();

        $user1->name = 'Usuario';
        $user1->apellidos = 'usuario';
        $user1->email = 'fabi@fabi.es';
        $user1->password = Hash::make('1234');
        $user1->telefono = '666666666';
        $user1->direccion = 'Aqui';
        $user1->estado = 1;
        $user1->rol_id = 1;
        $user1->imagen = '-';

        $user1->save();

        User::factory(30)->create();
    }
}
