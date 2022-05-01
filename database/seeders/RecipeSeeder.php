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
                'image_path' => '',
                'description' => 'Buñuelos aptos para celíacos, ¡ideales para una tarde lluviosa!
                1 Agregar en un bowl los huevos, el azúcar, la escencia de vainilla, el polvo para hornear y el aceite. 
                2 Revolver. 
                3 Incorporar la harina y la leche de a poco. 
                4 La masa debe quedar más bien durita, no líquida
                5 Colocar aceite en el fondo de una olla a fuego moderado.
                6 Freir los buñuelos hasta que estén dorados.
                7 Tomar porciones con una cuchara. Conviene que no sean muy grandes para que se cocinen bien.
                8 Espolvorear con azúcar impalpable y servir.'
            ],

            #PAN

            [
                'name' => 'Pan',
                'image' => 'https://t1.uc.ltmcdn.com/es/posts/1/8/0/como_hacer_pan_sin_gluten_23081_600.jpg',
                'image_path' => '',
                'description' => 'Pan sin gluten, ideal para acompañar con el mate, hacer hamburguesas, panchos, choripanes, ¡lo que quieras!'
            ]
        ];
        DB :: table ('recipes') -> insert ($data);
    }
}
