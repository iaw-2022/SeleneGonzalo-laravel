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
        $password = $hashed = Hash::make('Selene278827');

        $data = [
            'name' => 'Selene',
            'email' => 'iawselenegonzalo@gmail.com',
            'password' => $password
        ];
        DB :: table ('users') -> insert ($data);
    }
}

