<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feladat extends Model
{
    use HasFactory;

    protected $primaryKey = 'kod';

    protected $fillable = [
        'megnevezes',
        'munkadij'
    ];

    public static $feladatTipusok = [
        'fékbetét csere', 'turbó csere', 'turbó javítás', 'motorgenerál', 'alváz javítás', 'futóműállítás',
        'karosszéria lakatozás', 'váltó javítás','váltó csere', 'ékszíj csere', 'olajcsere', 'légszűrő csere',
        'kuplunk javítás', 'kuplung csere', 'hűtő javítás', 'hűtő csere','akumulátor csere', 'vezérlés javítás','vezérlés csere',
        'kormánymű javítás','kormánymű csere','ablaktörlő motor csere', 'gyertya csere', 'fényszóró beállítás', 'külső/belső tisztítás', 'fényezés', 'üvegjavítás', 'üvegcsere',
        'műszerfal javítás', 'klimatöltés', 'diagnosztika', 'fényszóró polírozás', 'kerékcsere', 'gumiabroncs javítás', 'gumiabroncs szerelés',
        'futómű javítás', 'elektromos rendszer javítás', 'külső világítás javítás', 'belső világítás javítás', 'hangszóró csere',
        'navigációs rendszer frissítés', 'riasztó rendszer javítás', 'részecskeszűrő tisztítás', 'EGR szelep csere', 'turbofeltöltő diagnosztika',
        'vezérműszíj csere', 'olajszűrő csere'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
