<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Alkatresz;
use App\Models\Auto;
use App\Models\Feladat;
use App\Models\Munkalap;
use App\Models\MunkalapTetel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create(10);
        // Alkatresz::factory()->create(10);
        // Feladat::factory()->create(10);
        // Auto::factory()->create(10);
        // Munkalap::factory()->create(10);
        // Munkalap::factory()->create(10);


        $this->tryToSeed(User::class, 10);
        $this->tryToSeed(Alkatresz::class, 10);
        $this->tryToSeed(Feladat::class, 15);
        $this->tryToSeed(Auto::class, 10);
        $this->tryToSeed(Munkalap::class, 10);
        $this->tryToSeed(MunkalapTetel::class, 5);
        $this->seedMunkalapTetel();
    }


    private function tryToSeed(string $modelClass, int $timesForCreate): void
    {
        DB::beginTransaction();
        try {
            $modelClass::factory($timesForCreate)->create();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            echo "Failed to seed {$modelClass}: {$th->getMessage()}\n";
        }
    }

    private function seedMunkalapTetel(): void
    {
        DB::beginTransaction();
        try {
            $munkalapok = Munkalap::all(); //Kiválasztom az összes munkalapot
            foreach ($munkalapok as $munkalap) { //Végig megyek az össze munkalapon
                $tetelSzam = rand(1, 5); // Belső ciklus mely létrehoz 1-5 munkalapTételt, munkalaponként
                for ($i = 0; $i < $tetelSzam; $i++) {
                    $munkalapTetelData = MunkalapTetel::factory()->make([
                        // 'munkalapSzam' => $munkalap->id,
                    ])->toArray(); //Munkalaptétel létrehozása, de még nem küldjük az ab-be

                    $munkafelvetelIdeje = Carbon::parse($munkalap->munkafelvetelIdeje);
                    $munkaKezdesiIdo = $munkafelvetelIdeje->addDays(rand(1, 10)); //Munkakezdési idő beállítása, Munkalap-MunkaFelvétel ideje utánra
                    $munkaBefejezesiIdo = $munkaKezdesiIdo->copy()->addDays(rand(1, 5)); //MunkaBefejezési idő beállítása

                    $munkalapTetelData['munkaKezdesiIdo'] = $munkaKezdesiIdo->toDateString(); //Érték megadása
                    $munkalapTetelData['munkaBefejezesiIdo'] = $munkaBefejezesiIdo->toDateString(); //Érték megadása

                    MunkalapTetel::create($munkalapTetelData); //Létrehozzuk az adatbázisba
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            echo "Failed to seed MunkalapTetel: {$th->getMessage()}\n";
        }
    }
}
