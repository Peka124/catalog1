<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products=[
            ["title"=>"Lamp", "description"=>"Flashy lamp, which lights red."],
            ["title"=>"Sofa", "description"=>"Super cozy sofa, just to sit on her, and enjoy Your day."],
        ];

        foreach($products as $product)
        {
            Product::create($product);
        }
    }
}
