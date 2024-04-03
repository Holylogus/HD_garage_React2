<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Munkalap extends Model
{
    use HasFactory;
    protected $primaryKey = 'munkalapSzam';
    protected $fillable = [
        'auto',
        'munkafelvetelIdeje',
        'leiras',
        'ugyfel',
        'munkavezeto',
        'kesz',
        'osszeg',
        'elvitelIdeje'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
