<?php

namespace Database\Factories;

use App\Models\Feladat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeladatTipus>
 */
class FeladatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        do {
            $megnevezes = fake()->randomElement(Feladat::$feladatTipusok);
        } while (Feladat::where('megnevezes', $megnevezes)->exists());

        return [
            'megnevezes' => fake()->randomElement(Feladat::$feladatTipusok),
            'munkadij' => fake()->numberBetween(3500,100000)
        ];
    }
}
