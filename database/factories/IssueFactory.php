<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "page" => fake()->word(),
            "browser" => fake()->randomElement(["firefox", "safari", "chrome"]),
            "screen_size" => fake()->randomElement(["mobile", "tablet", "desktop"]),
            "description" => fake()->sentence(10),
        ];
    }
}
