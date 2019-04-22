<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Report;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = ['1', '2', '3'];
        $faker = app(Faker\Generator::class);

        $reports = factory(Report::class)->times(20)->make()->each(function ($report) use ($faker, $user_ids) {
            $report->user_id = $faker->randomElement($user_ids);
            $report->content_id = $faker->randomElement($user_ids);
        });

        Report::insert($reports->toArray());
    }
}
