<?php

namespace Database\Factories;

use App\Models\Alkatresz;
use App\Models\Feladat;
use App\Models\Munkalap;
use App\Models\MunkalapTetel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MunkalapTetel>
 */
class MunkalapTetelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        do {
            $munkalapszam = fake()->randomElement(Munkalap::pluck('munkalapSzam'));
            $feladat = fake()->randomElement(Feladat::pluck('kod'));
        } while (MunkalapTetel::where('munkalapszam', $munkalapszam)->where('feladat', $feladat)->exists());

        $javCsere = fake()->boolean();

        $alkatreszRelatedFields = $javCsere ? [
            'alkatresz' => fake()->randomElement(Alkatresz::pluck('azonosito')),
            'mennyiség' => fake()->numberBetween(1, 5),
            'alkatreszAra' => fake()->numberBetween(10000, 120000),
            'alkatreszRendelesiIdo' => fake()->date('Y-m-d'),
            'alkatreszErkezesiIdo' => fake()->date(),
        ] : [
            'alkatresz' => null,
            'mennyiség' => null,
            'alkatreszAra' => null,
            'alkatreszRendelesiIdo' => null,
            'alkatreszErkezesiIdo' => null,
        ];

        return array_merge([
            'munkalapszam' => $munkalapszam,
            'feladat' => $feladat,
            'szerelo' => function () {
                return User::where('jogosultsag', 'szerelo')->inRandomOrder()->first()->id;
            },
            'javCsere' => $javCsere,
            'munkaKezdesiIdo' => fake()->date(),
            'munkaBefejezesiIdo' => fake()->date()
        ],
        $alkatreszRelatedFields
        );
    }
}
