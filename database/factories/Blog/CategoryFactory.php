<?php

namespace Database\Factories\Blog;

use App\Models\Auth\User;
use App\Models\Blog\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::first();
        return [
            'user_id' => $user->id,
            'name' => fake()->unique()->name,
        ];
    }
}
