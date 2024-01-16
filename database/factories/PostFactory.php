<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        return [
            'title' => $this->faker->sentence(2),
            'content' => $this->faker->text(250),
            'img' => $this->faker->imageUrl,
            'likes' => random_int(1, 999),
            'is_published' => 1,
            'category_id' => Category::get()->random()->id,
        ];
    }
}
