<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
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
                'name' => 'Buñuelos',
                'image' => 'https://www.pequerecetas.com/wp-content/uploads/2021/02/bunuelos-de-cuaresma-receta-660x879.jpg',
                'description' => 'Buñuelos aptos para celíacos, ¡ideales para una tarde lluviosa!'
            ],

            #PAN

            [
                'name' => 'Pan',
                'image' => 'https://t1.uc.ltmcdn.com/es/posts/1/8/0/como_hacer_pan_sin_gluten_23081_600.jpg',
                'description' => 'Pan sin gluten, ideal para acompañar con el mate, hacer hamburguesas, panchos, choripanes, ¡lo que quieras!'
            ]
        ];
        DB :: table ('recipes') -> insert ($data);
    }
}
