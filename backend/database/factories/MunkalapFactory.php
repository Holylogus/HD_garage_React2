<?php

namespace Database\Factories;

use App\Models\Auto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Munkalap>
 */
class MunkalapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $munkaFelvetelIdeje = fake()->dateTimeBetween('2022-01-01','now');

        $elvitelIdeje = fake()->dateTimeBetween($munkaFelvetelIdeje,'now');

        $kesz = fake()->boolean();

        $keszRelatedFields = $kesz ? [
            'elvitelIdeje' => $elvitelIdeje,
            'osszeg' => fake()->numberBetween(10000,500000)
        ] : [
            'elvitelIdeje' =>null,
            'osszeg'=>null
        ];

        return array_merge([
            'auto'=>fake()->randomElement(Auto::pluck('autoAzonosito')),
            'munkafelvetelIdeje'=>$munkaFelvetelIdeje,
            'leiras'=>fake('HU_hu')->sentence(10),
            'ugyfel'=>fake()->randomElement(User::pluck('id')),
            'munkavezeto' => function () {
                // Munkavezető kiválasztása, akinek a pozíciója 'vezetoSzerelo'
                return User::where('jogosultsag', 'vezetoSzerelo')->inRandomOrder()->first()->id;
            },
            'kesz'=>$kesz,
        ], $keszRelatedFields);
    }
}
