<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alkatresz extends Model
{
    use HasFactory;

    protected $primaryKey = 'azonosito';

    public $incrementing = false;

    protected $fillable = [
        'megnevezes',
        'beszallito'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static $alkatreszek = [
        'fék', 'gumiabroncs', 'motor', 'gyújtógyertya', 'porlasztó', 'lánctalp',
        'motorvezérlő egység', 'napellenző', 'üzemanyagszűrő', 'kormányberendezés', 'visszapillantó tükör',
        'nyári gumi', 'téli gumi', 'sebességváltó', 'klímaberendezés', 'zárrendszer', 'üzemanyag-szállító rendszer',
        'tengelykapcsoló', 'vonóhorog', 'kipufogó', 'szélvédő', 'elülső ablak', 'hátulsó ablak', 'fényszóró izzó',
        'jelzőizzó', 'led', 'műszerfal világítás', 'nappali menetfény', 'autó ülés', 'keréktárcsa', 'csapágy',
        'szivargyújtó', 'rugó', 'olajszűrő', 'légzsák', 'indítómotor', 'akkumulátor', 'kuplung', 'féktárcsa',
        'futómű', 'hűtőrács', 'külső visszapillantó tükör', 'ablaktörlő lapát', 'kormánymű', 'lengéscsillapító',
        'hűtőventilátor', 'olajpumpa', 'vízpumpa', 'ékszíj', 'vezérműszíj', 'turbófeltöltő', 'katalizátor',
        'üzemanyagtank', 'légszűrő', 'kormánykerék', 'kézifék', 'ajtózár', 'kuplungtárcsa'
    ];
}
