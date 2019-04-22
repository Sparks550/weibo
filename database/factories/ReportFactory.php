<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Report::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'report_type' => $faker->name(),
        'report_content' => $faker->text(),
        'report_type' => '1',
        'is_report' => true,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
