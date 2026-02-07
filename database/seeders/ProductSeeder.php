<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('products')->insert([
            'name' => Str::random(10),
            'details' => Str::random(50),
            'sku' => Str::random(10),
            'stock' => rand(1, 20),
            'price' => rand(20.00, 5000.00),
            'image' => 'product_photo/nophoto.jpg',
            'category_id' => rand(1, 4)
        ]);
    }
}


	
