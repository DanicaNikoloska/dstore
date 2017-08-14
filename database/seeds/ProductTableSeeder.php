<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('products')->insert([[
                'name' => 'Rose Crystal Bracelet',
                'description' => 'Fashion Cartoon Bears Bangle Rose Crystal Charm Bracelet Jewelry Women Lady Girl',
                'available' => 1,
                'price' => 30,
                'image' => '1.png',
                'quantity' => '10'
            ],
            [
                'name' => 'Blue Crystal Charm Heart',
                'description' => 'Women Lady Fashion blue Crystal Charm Heart To Heart Bracelets Bangle Chain New',
                'available' => 1,
                'price' => 20,
                'image' => '4.png',
                'quantity' => '5'
            ],
            [
                'name' => 'Silver Plated Chain Charm',
                'description' => 'Pretty Girl Silver Plated Chain Charm Starfish Latest Style Bangle Bracelet whit',
                'available' => 1,
                'price' => 25,
                'image' => '3.png',
                'quantity' => '2'
            ],
            [
                'name' => 'Crystal Charm Bracelet',
                'description' => 'Gold Plated Pearl Cuff Rhinestone Crystal Charm Bracelet Bangle Fashion Women',
                'available' => 1,
                'price' => 35,
                'image' => '2.png',
                'quantity' => '4'
            ],
            [
                'name' => 'Crystal Choker',
                'description' => 'Fashion Jewelry Pendant Crystal Choker Chunky Statement Chain Bib Necklace',
                'available' => 1,
                'price' => 20,
                'image' => 'necklace1.jpg',
                'quantity' => '2'
            ],
            [
                'name' => 'Crystal Pendant Necklace',
                'description' => 'Silver Chain Rhinestone Crystal Pendant Necklace',
                'available' => 1,
                'price' => 15,
                'image' => 'necklace2.png',
                'quantity' => '4'
            ],
            [
                'name' => 'Diamante Butterfly Brooch',
                'description' => 'New Large Vintage Alloy Rhinestone Diamante Butterfly Brooch',
                'available' => 1,
                'price' => 25,
                'image' => 'brooche1.jpg',
                'quantity' => '6'
            ]

                ]
        );
    }
}
