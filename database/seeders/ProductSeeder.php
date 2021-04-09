<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->create([
            'name' => 'Aqua',
            'price' => 3000,
            'quantity' => 100,
            'image_url' => 'products/aqua.jpg',
        ]);
        Product::query()->create([
            'name' => 'Coca-Cola',
            'price' => 5000,
            'quantity' => 100,
            'image_url' => 'products/coca-cola.jpg',
        ]);
        Product::query()->create([
            'name' => 'Fanta Orange',
            'price' => 4000,
            'quantity' => 100,
            'image_url' => 'products/fanta.jpg',
        ]);
        Product::query()->create([
            'name' => 'Mizone',
            'price' => 7000,
            'quantity' => 100,
            'image_url' =>  'products/mizone.jpg',
        ]);
    }
}
