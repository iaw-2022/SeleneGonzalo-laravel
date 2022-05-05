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

        $data = [
            [
                'name' => 'Selene',
                'id_rol' => '1',
                'email' => 'iawselenegonzalo@gmail.com',
                'password' => $password_selene
            ],
            [
                'name' => 'Fausto',
                'id_rol' => '2',
                'email' => 'faustojgonzalo@gmail.com',
                'password' => $password_fausto
            ]
        ];
        DB :: table ('users') -> insert ($data);
    }
}

