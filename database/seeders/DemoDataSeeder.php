<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat1 = \App\Models\Category::create(['name' => 'Electrónica', 'description' => 'Gadgets and devices']);
        $cat2 = \App\Models\Category::create(['name' => 'Muebles', 'description' => 'Home decor and furniture']);

        \App\Models\Product::create([
            'name' => 'Laptop Pro 14',
            'price' => 1200.00,
            'stock' => 15,
            'status' => true,
            'category_id' => $cat1->id
        ]);

        \App\Models\Product::create([
            'name' => 'Escritorio Gamer',
            'price' => 450.50,
            'stock' => 8,
            'status' => true,
            'category_id' => $cat2->id
        ]);
    }
}
