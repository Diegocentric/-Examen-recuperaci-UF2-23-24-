<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name' => 'Product 1', 'price' => 10.00, 'brand_id' => 1]);
        Product::create(['name' => 'Product 2', 'price' => 20.00, 'brand_id' => 2]);
        Product::create(['name' => 'Product 3', 'price' => 30.00, 'brand_id' => 3]);
    }
}
