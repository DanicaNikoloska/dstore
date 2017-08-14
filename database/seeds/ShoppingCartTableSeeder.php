<?php

use Illuminate\Database\Seeder;

class ShoppingCartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shopping_carts')->insert([
                'user_id' => '3'
            ]
        );
    }
}
