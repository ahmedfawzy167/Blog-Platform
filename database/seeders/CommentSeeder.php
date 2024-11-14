<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'content' => 'This is a very informative article on technology. The advancements you mentioned are indeed shaping our future!',
            'post_id' => 1,
            'user_id' => 2,
        ]);

        Comment::create([
            'content' => 'I agree, AI and quantum computing are definitely game-changers. Looking forward to seeing how they will impact various industries.',
            'post_id' => 1,
            'user_id' => 1,
        ]);

        Comment::create([
            'content' => 'Great tips! I’ve been struggling with work-life balance for a while now. Definitely going to implement some of these suggestions.',
            'post_id' => 2,
            'user_id' => 2,
        ]);

        Comment::create([
            'content' => 'I think a healthy lifestyle is all about consistency. The small changes, like getting enough sleep and exercising regularly, make a huge difference.',
            'post_id' => 5,
            'user_id' => 1,
        ]);
    }
}
