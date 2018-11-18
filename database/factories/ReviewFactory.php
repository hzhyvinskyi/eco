<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'product_id' => function () {
            return App\Product::all()->random();
        },
        'review' => $faker->paragraph,
        'customer' => $faker->name,
        'star' => $faker->numberBetween(0, 5)
    ];
});
