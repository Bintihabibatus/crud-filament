<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        Blog::create([
            'title' => 'First Blog Example',
            'body' => 'This is an example blog for testing purposes.',
            'date' => now()->format('Y-m-d'),
        ]);

        Blog::create([
            'title' => 'Second Blog',
            'body' => 'This is another example blog to test the table.',
            'date' => now()->subDays(1)->format('Y-m-d'),
        ]);
    }
}