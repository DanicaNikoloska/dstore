<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('categories')->insert([[
                'name' => 'Bracelets',
                'description' => 'Women Bracelets'
            ],
            [
                'name' => 'Necklaces',
                'description' => 'Women Necklaces'
            ],
            [
                'name' => 'Brooches',
                'description' => 'Women Brooches'
            ]
                ]
        );
    }
}
