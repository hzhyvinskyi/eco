<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return \App\User::all()->random();
        },
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(100, 10000),
        'discount' => $faker->numberBetween(3, 25),
        'stock' => $faker->numberBetween(0, 1)
    ];
});
