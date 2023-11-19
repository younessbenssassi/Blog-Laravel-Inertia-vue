<?php

namespace Database\Factories\Blog;

use App\Enums\Blog\PostStatus;
use App\Models\Auth\User;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::first();
        $categoriesIds = Category::pluck('id');

        return [
            'user_id' => $user->id,
            'category_id' => fake()->randomElement($categoriesIds),
            'status' => fake()->randomElement(PostStatus::getValues()),
            'title' => fake()->name,
            'content' => fake()->paragraph,
        ];
    }
}
