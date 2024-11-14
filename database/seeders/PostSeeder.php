<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'The Future of Technology: Innovations That Will Change the World',
            'content' => 'In the ever-evolving landscape of technology, advancements like AI, 5G, and quantum computing are poised to revolutionize industries and everyday life.',
            'category' => 'Technology',
            'author_id' => 1,
        ]);

        Post::create([
            'title' => '10 Essential Lifestyle Tips for Better Work-Life Balance',
            'content' => 'Achieving work-life balance is a challenge for many. These tips can help you manage your time, set boundaries, and make room for self-care.',
            'category' => 'Lifestyle',
            'author_id' => 2,
        ]);


        Post::create([
            'title' => 'Understanding the Basics of Educational Psychology',
            'content' => 'Educational psychology explores how people learn and retain knowledge. Understanding the psychological principles behind learning can greatly improve teaching methods.',
            'category' => 'Education',
            'author_id' => 1,
        ]);

        Post::create([
            'title' => 'The Rise of Smart Homes: A Look Into the Future of Living',
            'content' => 'Smart homes are no longer just a futuristic concept. With devices like smart thermostats, lights, and security systems, you can control your home environment from anywhere.',
            'category' => 'Technology',
            'author_id' => 2,
        ]);

        Post::create([
            'title' => 'Exploring Healthy Lifestyle Habits for a Longer Life',
            'content' => 'A healthy lifestyle is the key to a longer, more fulfilling life. From nutrition to exercise, these habits will ensure you live your best life.',
            'category' => 'Lifestyle',
            'author_id' => 1,
        ]);
    }
}
