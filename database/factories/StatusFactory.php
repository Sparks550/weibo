<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Status::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'content' => $faker->text(),
        'repost_count' => '1',
        'like_count' => '1',
        'repost_content' => '1',
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});