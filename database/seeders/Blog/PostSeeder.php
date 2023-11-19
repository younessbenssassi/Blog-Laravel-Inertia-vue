<?php

namespace Database\Seeders\Blog;

use App\Models\Blog\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(300)->create();
    }
}
