<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::factory()
            ->count(50)
            ->create()
            ->each(function ($post) {
                $comments = \App\Comment::factory()->count(2)->make();
                $post->comments()->saveMany($comments);
            });
    }
}
