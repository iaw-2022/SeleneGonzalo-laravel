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
                'name' => 'huevo'
            ],
            [
                'name' => 'premezcla sin gluten'
            ],
            [
                'name' => 'azucar'
            ],
            [
                'name' => 'polvo de hornear'
            ],
            [
                'name' => 'leche'
            ],
            [
                'name' => 'esencia de vainilla'
            ],
            [
                'name' => 'sal'
            ],
            [
                'name' => 'aceite'
            ],
            [
                'name' => 'agua'
            ],
            [
                'name' => 'levadura en polvo'
            ]
        ];
        DB :: table ('ingredients') -> insert ($data);
    }
}
