<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'email' => $this->faker->sentence(),
            'subject' => $this->faker->sentence(),
            'message' => $this->faker->sentence(),
            'status' => rand(0, 1),
        ];
    }
}
