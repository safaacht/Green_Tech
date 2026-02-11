<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = \App\Models\Category::first();
        if ($category) {
            \App\Models\Product::firstOrCreate(
                ['name' => 'Plante Aloe Vera'],
                [
                    'description' => 'Une plante médicinale facile à entretenir.',
                    'price' => 150.00,
                    'category_id' => $category->id,
                ]
            );
        }
    }
}
