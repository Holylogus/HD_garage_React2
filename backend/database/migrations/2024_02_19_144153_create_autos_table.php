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
        Schema::create('autos', function (Blueprint $table) {
            $table->id('autoAzonosito');
            $table->string('alvazszam');
            $table->string('marka');
            $table->string('motorkod');
            $table->integer('gyartasiEv');
            $table->integer('gyartasiHo');
            $table->timestamps();
        });

        DB::update('ALTER TABLE autos AUTO_INCREMENT = 100');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
