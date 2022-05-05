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
                'id_user' => '1'
            ],
            [
                'id_recipe' => '2',
                'id_user' => '2'
            ]
        ];
        DB :: table ('upload') -> insert ($data);
    }
}
