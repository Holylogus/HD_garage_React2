<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->date('szuletesiIdo');
            $table->string('lakcim');
            $table->string('telefonszam')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('jogosultsag')->default('felhasznalo');
            $table->string('api_token', 60)->nullable(); // specify the length also
            $table->rememberToken();
            $table->timestamps();
        });
        User::create(
            [
                'nev' => 'admin',
                'szuletesiIdo' => '1994.10.14',
                'lakcim'=> '2354 Kukac Giliszta utca 14.',
                'telefonszam'=> '06706152347',
                'email' => 'admin@gmail.com',
                'jogosultsag' => 'admin',
                'password' => 'admin',
            ]
        );

        User::create(
            [
                'nev' => 'Pálinkás Zoltán',
                'szuletesiIdo' => '1996-09-02 17:00',
                'lakcim' => '2345 Kukutyin Avar utca 12.',
                'telefonszam' => '06306234578',
                'email' => 'p.zoltan@gmail.com',
                'jogosultsag' => 'szerelo',
                'password' => 'dolgozo',
            ]
        );
        User::create(
            [
                'nev' => 'Mayer Zsolt',
                'szuletesiIdo' => '1998-07-26 08:00',
                'lakcim' => '1105 Budapest Kókány Jenő utca 14.',
                'telefonszam' => '06305239658',
                'email' => 'm.zsolt@gmail.com',
                'jogosultsag' => 'szerelo',
                'password' => 'dolgozo',
            ]
        );
        User::create(
            [
                'nev' => 'Nap Anikó',
                'szuletesiIdo' => '1997-11-12 11:00',
                'lakcim' => '1026 Budapest Petőfi Sándor utca 17.',
                'telefonszam' => '06204159563',
                'email' => 'n.aniko@gmail.com',
                'jogosultsag' => 'recepciós',
                'password' => 'dolgozo',
            ]
        );
        User::create(
            [
                'nev' => 'Giliszta Dávid',
                'szuletesiIdo' => '1995-11-04 11:00',
                'lakcim' => '2343 Tápószele Gerle utca 8.',
                'telefonszam' => '06305273218',
                'email' => 'g.david@gmail.com',
                'jogosultsag' => 'vezetoszerelo',
                'password' => 'dolgozo',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
