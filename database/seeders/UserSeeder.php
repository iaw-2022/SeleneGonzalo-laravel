<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password_selene = Hash::make('Selene278827');
        $password_fausto = Hash::make('Fausto121112');
        $password_prueba = Hash::make('pass');
        $password_admin = Hash::make('admin');
        $password_observer = Hash::make('obs');
        $password_user = Hash::make('user');

        $data = [
            [
                'email' => 'prueba@mail.com',
                'id_rol' => '1',
                'name' => 'prueba',
                'password' => $password_prueba,
            ],
            [
                'email' => 'observer@observer.com',
                'id_rol' => '3',
                'name' => 'observer',
                'password' => $password_observer,
            ],
            [
                'email' => 'admin@admin.com',
                'id_rol' => '1',
                'name' => 'admin',
                'password' => $password_admin,
            ],
            [
                'email' => 'user@user.com',
                'id_rol' => '2',
                'name' => 'user',
                'password' => $password_user,
            ]
        ];
        DB :: table ('users') -> insert ($data);
    }
}

