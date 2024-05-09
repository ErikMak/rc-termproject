<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'car_id' => Car::get()->random()->model_id,
            'user_id' => User::factory(),
            'text' => $this->faker->text($maxNbChars = 200),
            'rating' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5)
        ];
    }
}
