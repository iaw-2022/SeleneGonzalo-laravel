<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HasRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            #RECETA BUÑUELOS

            [
                'lot' => '2',
                'id_ingredient' => '1',
                'id_recipe' => '1'
            ],
            [
                'lot' => '1 taza',
                'id_ingredient' => '2',
                'id_recipe' => '1'
            ],
            [
                'lot' => '2 cucharadas',
                'id_ingredient' => '3',
                'id_recipe' => '1'
            ],
            [
                'lot' => '1 cucharada',
                'id_ingredient' => '4',
                'id_recipe' => '1'
            ],
            [
                'lot' => '1/4 taza',
                'id_ingredient' => '5',
                'id_recipe' => '1'
            ],
            [
                'lot' => '1 cucharada pequeña',
                'id_ingredient' => '6',
                'id_recipe' => '1'
            ],
            [
                'lot' => '1 cucharada pequeña',
                'id_ingredient' => '7',
                'id_recipe' => '1'
            ],
            [
                'lot' => 'cantidad necesaria para freir',
                'id_ingredient' => '8',
                'id_recipe' => '1'
            ],

            #RECETA PAN

            [
                'lot' => '500 g',
                'id_ingredient' => '2',
                'id_recipe' => '2'
            ],
            [
                'lot' => '20 g',
                'id_ingredient' => '3',
                'id_recipe' => '2'
            ],
            [
                'lot' => '200 ml (aprox. un vaso)',
                'id_ingredient' => '5',
                'id_recipe' => '2'
            ],
            [
                'lot' => '550 ml (aprox. dos vasos y medio)',
                'id_ingredient' => '9',
                'id_recipe' => '2'
            ],
            [
                'lot' => '10 g',
                'id_ingredient' => '10',
                'id_recipe' => '2'
            ]
        ];
        DB :: table ('has') -> insert ($data);
    }
}
