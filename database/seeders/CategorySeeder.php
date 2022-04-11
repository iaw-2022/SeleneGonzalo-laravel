<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Desayuno'
            ],
            [
                'name' => 'Almuerzo'
            ],
            [
                'name' => 'Merienda'
            ],
            [
                'name' => 'Cena'
            ]
        ];
        DB :: table ('categories') -> insert ($data);
    }
}
