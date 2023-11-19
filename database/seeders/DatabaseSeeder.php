<?php

namespace Database\Seeders;

use App\Models\Blog\Post;
use Database\Seeders\Auth\UserSeeder;
use Database\Seeders\Blog\CategorySeeder;
use Database\Seeders\Blog\PostSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
