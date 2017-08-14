<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Category;
use App\Product;
use App\User;

//creating fake users
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role' => $faker->randomElement([User::MODERATOR, User::VISITOR, User::ADMIN])
    ];
});

//create fake categories
$factory->define(Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'description' =>$faker->paragraph(1)
    ];
});

//create fake products
$factory->define(Product::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence(5),
        'available' => $faker->randomElement([0,1]),
        'price' => $faker->numberBetween(500, 5000),
        'quantity' => $faker->numberBetween(0, 30),
        'image' => $faker->randomElement(['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg'])
    ];
});