<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name'=>'Plantes'],
            ['name'=>'Graines'],
            ['name'=>'Outils']
        ]);

        // DB::table('categories')->insert($categories);
    }
}
