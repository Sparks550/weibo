<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content_id = ['1', '2', '3'];
        $faker = app(Faker\Generator::class);

        $content = factory(Comment::class)->times(50)->make()->each(function ($comment) use ($faker, $content_id) {
            $comment->content_id = $faker->randomElement($content_id);
        });

        Comment::insert($content->toArray());
    }
}
