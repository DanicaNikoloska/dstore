<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('users')->insert([[
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 0
            ],
            [
                'name' => 'moderator',
                'email' => 'moderator@gmail.com',
                'password' => bcrypt('moderator123'),
                'role' => 1
            ],[
                'name' => 'visitor',
                'email' => 'visitor@gmail.com',
                'password' => bcrypt('visitor123'),
                'role' => 2
            ]]
            );

    }
}
