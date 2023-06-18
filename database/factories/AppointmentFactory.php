<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
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
            'phone' => $this->faker->sentence(),
            'email' => $this->faker->sentence(),
            'date_time' => $this->faker->sentence(),
            'notes' => $this->faker->sentence(),
            'status' => rand(0,1),
        ];
    }
}
