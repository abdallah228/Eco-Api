<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Review::class, function (Faker $faker) {
    return [
        //
        'product_id'=>function(){
           return Product::all()->random();
        },
        'customer'=>$faker->name,
        'review'=>$faker->paragraph,
        'star'=>$faker->numberBetween(0,5),
    ];
});
