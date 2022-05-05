<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
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
                'name' => 'Huevo'
            ],
            [
                'name' => 'Premezcla sin gluten'
            ],
            [
                'name' => 'Azucar'
            ],
            [
                'name' => 'Polvo de hornear'
            ],
            [
                'name' => 'Leche'
            ],
            [
                'name' => 'Esencia de vainilla'
            ],
            [
                'name' => 'Sal'
            ],
            [
                'name' => 'Aceite'
            ],
            [
                'name' => 'Agua'
            ],
            [
                'name' => 'Levadura en polvo'
            ]
        ];
        DB :: table ('ingredients') -> insert ($data);
    }
}
