<?php

namespace App\Http\Controllers;

use App\Models\Alkatresz;
use Illuminate\Http\Request;

class AlkatreszController extends Controller
{
    public function index()
    {
        $Alkatreszs = response()->json(Alkatresz::all());
        return $Alkatreszs;
    }

    public function show($id)
    {
        $Alkatresz = response()->json(Alkatresz::find($id));
        return $Alkatresz;
    }

    public function store(Request $request)
    {
        $Alkatresz = new Alkatresz();
        $Alkatresz->fill($request->all());
        $Alkatresz->save();
    }

    public function update(Request $request, $id)
    {
        $Alkatresz = Alkatresz::find($id);
        if ($request->cikkszam !== NULL) {
        $Alkatresz->cikkszam = $request->cikkszam;}
        if ($request->megnevezes !== NULL) {
        $Alkatresz->megnevezes = $request->megnevezes;}
        if ($request->listaar !== NULL) {
        $Alkatresz->listaar = $request->listaar;}
        if ($request->beszallito !== NULL) {
        $Alkatresz->beszallito = $request->beszallito;}
        $Alkatresz->save();
    }

    public function destroy($id)
    {
        Alkatresz::find($id)->delete();
    }
}
