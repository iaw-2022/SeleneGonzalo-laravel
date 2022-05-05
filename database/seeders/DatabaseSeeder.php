<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BelongsRelationSeeder::class);
        $this->call(HasRelationSeeder::class);
        $this->call(QualifiesRelationSeeder::class);
        $this->call(UploadRelationSeeder::class);
    }
}
