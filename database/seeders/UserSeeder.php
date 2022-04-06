<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Fecades\DB;
use Illuminate\Support\Fecades\Hash;

class UserSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password = $hashed = Hash::make('Selene278827',[

            'rounds' => 12,
        ]);

        $data = [
            'name' => 'Selene',
            'email' => 'iaw-selenegonzalo@gmail.com',
            'password' => $password
        ];
        DB :: table ('users') -> insert ($data);
    }
}

