<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $primaryKey = 'autoAzonosito';

    protected $fillable = [
        'alvazszam',
        'marka',
        'motorkod',
        'gyartasiEv',
        'gyartasiHo'
    ];

    public static $markak = [
        'Opel','Ford','BMW','KIA','Citroen','Renault',
        'Suzuki','Honda','Toyota','Mazda','Volskwagen'
    ];
}
