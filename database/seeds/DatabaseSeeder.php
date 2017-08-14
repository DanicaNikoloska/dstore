<?php

use App\Category;
use App\Product;
use App\ShoppingCart;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // empty tables before seeding
        User::truncate();
        Category::truncate();
        Product::truncate();
        ShoppingCart::truncate();
        DB::table('category_product')->delete();
        DB::table('shopping_cart_product')->delete();

        // call the seeders to insert the data in the tables
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CategoryProductTableSeeder::class);
        $this->call(ShoppingCartTableSeeder::class);
        $this->call(ShoppingCartProductTableSeeder::class);

    }
}
