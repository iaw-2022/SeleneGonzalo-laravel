<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BelongsRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            #BUÑUELOS

            [
                'id_category' => '1',
                'id_recipe' => '1'
            ],
            [
                'id_category' => '3',
                'id_recipe' => '1'
            ],

            #PAN
            
            [
                'id_category' => '1',
                'id_recipe' => '2'
            ],
            [
                'id_category' => '2',
                'id_recipe' => '2'
            ],
            [
                'id_category' => '3',
                'id_recipe' => '2'
            ],
            [
                'id_category' => '4',
                'id_recipe' => '2'
            ]

        ];
        DB :: table ('belongs') -> insert ($data);
    }
}
