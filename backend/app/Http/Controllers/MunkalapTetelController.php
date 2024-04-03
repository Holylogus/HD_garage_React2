<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MunkalapTetel;
use Illuminate\Http\Request;

class MunkalapTetelController extends Controller
{
    public function index()
    {

        $munkalapTetel = response()->json(MunkalapTetel::all());
        return $munkalapTetel;
    }

    public function show($id)
    {
        $munkalapTetel = response()->json(MunkalapTetel::find($id));
        return $munkalapTetel;
    }

    public function store(Request $request)
    {
        $munkalapTetel = new MunkalapTetel();
        $munkalapTetel->feladat = $request->feladat;
        $munkalapTetel->szerelo = $request->szerelo;
        $munkalapTetel->javCsere = $request->javCsere;
        $munkalapTetel->alkatresz = $request->alkatresz;
        $munkalapTetel->mennyiség = $request->mennyiség;
        $munkalapTetel->alkatreszAra = $request->alkatreszAra;
        $munkalapTetel->alkatreszRendelesiIdo = $request->alkatreszRendelesiIdo;
        $munkalapTetel->alkatreszErkezesiIdo = $request->alkatreszErkezesiIdo;
        $munkalapTetel->munkaKezdesiIdo = $request->munkaKezdesiIdo;
        $munkalapTetel->munkaBefejezesiIdo = $request->munkaBefejezesiIdo;
        $munkalapTetel->save();
    }

    public function update($id, Request $request)
    {
        $munkalapTetel = MunkalapTetel::find($id);
        $munkalapTetel->feladat = $request->feladat;
        $munkalapTetel->szerelo = $request->szerelo;
        $munkalapTetel->javCsere = $request->javCsere;
        $munkalapTetel->alkatresz = $request->alkatresz;
        $munkalapTetel->mennyiség = $request->mennyiség;
        $munkalapTetel->alkatreszAra = $request->alkatreszAra;
        $munkalapTetel->alkatreszRendelesiIdo = $request->alkatreszRendelesiIdo;
        $munkalapTetel->alkatreszErkezesiIdo = $request->alkatreszErkezesiIdo;
        $munkalapTetel->munkaKezdesiIdo = $request->munkaKezdesiIdo;
        $munkalapTetel->munkaBefejezesiIdo = $request->munkaBefejezesiIdo;
        $munkalapTetel->save();
    }

    public function destroy($id)
    {
        MunkalapTetel::find($id)->delete();
    }
}
