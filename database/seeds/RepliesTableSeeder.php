<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment_id = ['1', '2', '3'];
        $faker = app(Faker\Generator::class);

        $replies = factory(Reply::class)->times(50)->make()->each(function ($reply) use ($faker, $comment_id) {
            $reply->comment_id = $faker->randomElement($comment_id);
        });

        Reply::insert($replies->toArray());
    }
}
