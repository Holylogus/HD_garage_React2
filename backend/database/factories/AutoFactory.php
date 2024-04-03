<?php

namespace Database\Factories;

use App\Models\Auto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auto>
 */
class AutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alvazszam'=>fake()->regexify('[A-Z]{2}[0-9]{2}[A-Z0-9]{5}[0-9]{6}'),
            'marka'=>fake()->randomElement(Auto::$markak),
            'motorkod'=>fake()->regexify('[A-Z0-9]{17}'),
            'gyartasiEv'=>fake()->date('Y'),
            'gyartasiHo'=>fake()->numberBetween(1,12)
        ];
    }
}
