<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunkalapTetel extends Model
{
    use HasFactory;
    protected $primaryKey = "munkalapszam";

    protected $fillable = [
        'feladat',
        'szerelo',
        'javCsere',
        'alkatresz',
        'mennyiség',
        'alkatreszAra',
        'alkatreszRendelesiIdo',
        'alkatreszErkezesiIdo',
        'munkaKezdesiIdo',
        'munkaBefejezesiIdo'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
