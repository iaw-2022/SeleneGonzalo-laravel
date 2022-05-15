<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RolSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Administrador',
            ],
            [
                'name' => 'Usuario',
            ],
            [
                'name' => 'Observador',
            ]
        ];
        DB :: table ('roles') -> insert ($data);
    }
}

