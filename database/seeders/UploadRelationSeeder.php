<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UploadRelationSeeder extends Seeder
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
                'id_recipe' => '1',
                'user_email' => 'iawselenegonzalo@gmail.com',
            ],
            [
                'id_recipe' => '2',
                'user_email' => 'faustojgonzalo@gmail.com',
            ]
        ];
        DB :: table ('upload') -> insert ($data);
    }
}
