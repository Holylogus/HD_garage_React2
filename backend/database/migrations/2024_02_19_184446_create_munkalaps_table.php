<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('munkalaps', function (Blueprint $table) {
            $table->id('munkalapSzam');
            $table->foreignId('auto')->references('autoAzonosito')->on('autos');
            $table->date('munkafelvetelIdeje');
            $table->string('leiras')->nullable();
            $table->foreignId('ugyfel')->references('id')->on('users');
            $table->foreignId('munkavezeto')->references('id')->on('users');
            $table->boolean('kesz')->nullable();
            $table->integer('osszeg')->nullable();
            $table->date('elvitelIdeje')->nullable();
            $table->timestamps();
        });

        DB::update('ALTER TABLE munkalaps AUTO_INCREMENT = 1000');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munkalaps');
    }
};
