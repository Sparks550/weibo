<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Reply::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
       // 'user_id' => $faker->numberBetween(1, 3),
        'comment_id' => $faker->numberBetween(1, 3),
        'reply_content' => $faker->text(),
        'reply_count' => $faker->numberBetween(1, 10),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});