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
        $categories = ['Plantes', 'Graines', 'Outils'];
        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
