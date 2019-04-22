<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'comment_content' => $faker->text(),
       // 'user_id' => $faker->numberBetween(1, 3),
        'comment_count' => $faker->numberBetween(1, 10),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
