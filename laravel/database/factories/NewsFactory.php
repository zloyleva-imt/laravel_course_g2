<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\News;
use Faker\Generator as Faker;
use \Illuminate\Support\Str;

$factory->define(News::class, function (Faker $faker) {
    $title = $faker->sentence(7);
    $views = $faker->numberBetween(0,100);
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->paragraph(10),
        'thumbnail' => $faker->imageUrl(),
        'views' => $views,
        'likes' => $faker->numberBetween(0,$views),
        'published_status' => $faker->randomElement(config('settings.db.published_status')),
    ];
});
