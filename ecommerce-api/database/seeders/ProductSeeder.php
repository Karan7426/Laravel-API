<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Seeded Product 1',
            'description' => 'This is a seeded product.',
            'price' => '19.99',
            'stock' => 100
        ]);

        Product::create([
            'name' => 'Seeded Product 2',
            'description' => 'This is another seeded product.',
            'price' => '29.99',
            'stock' => 50
        ]);
    }
}
