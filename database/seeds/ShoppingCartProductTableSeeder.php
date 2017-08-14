<?php

use Illuminate\Database\Seeder;

class ShoppingCartProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shopping_cart_product')->insert([
                [
                    'cart_id' => 1,
                    'product_id' => 1
                ],
                [
                    'cart_id' => 1,
                    'product_id' => 2
                ]
                ]
        );
    }
}
