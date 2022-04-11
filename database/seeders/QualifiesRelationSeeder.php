<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualifiesRelationSeeder extends Seeder
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
                'commentary' => 'Recomiendo usar un huevo en vez de dos, el resto impecable! ',
                'qualification' => '8.5/10',
                'user_email' => 'faustojgonzalo@gmail.com',
                'id_recipe' => '1'
            ]
        ];
        DB :: table ('qualifies') -> insert ($data);
    }
}
