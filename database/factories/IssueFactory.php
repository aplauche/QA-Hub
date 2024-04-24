<?php

namespace Database\Factories;

use App\Models\Check;
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
            "browser" => fake()->randomElement(Check::$browsers),
            "screen_size" => fake()->randomElement(Check::$screen_sizes),
            "description" => fake()->sentence(10),
        ];
    }
}
