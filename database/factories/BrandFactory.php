<?php

use Faker\Generator as Faker;
use App\Brand;

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
