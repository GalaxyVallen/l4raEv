<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'title' => fake()->sentence(mt_rand(1, 5)),
            'slug' => fake()->slug(),
            'excrpt' => fake()->sentence(mt_rand(1, 7)),
            // 'content' => '<p>' . implode('<p></p>', fake()->paragraphs(mt_rand(3, 6))) . '</p>',
            'content' => collect(fake()->paragraphs(mt_rand(3, 7)))->map(fn ($p) => "<p>$p</p>")->implode(''),
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 5)
        ];
    }
}
