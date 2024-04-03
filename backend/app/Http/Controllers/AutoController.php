<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AutoController extends Controller
{
    public function index()
    {

        $auto = response()->json(Auto::all());
        return $auto;
    }

    public function show($id)
    {
        $auto = response()->json(Auto::find($id));
        return $auto;
    }

    public function store(Request $request)
    {
        $auto = new Auto();
        $auto->alvazszam = $request->alvazszam;
        $auto->marka = $request->marka;
        $auto->motorkod = $request->motorkod;
        $auto->gyartasiEv = $request->gyartasiEv;
        $auto->gyartasiHo = $request->gyartasiHo;
        $auto->save();
    }

    public function update($id, Request $request)
    {
        $auto = Auto::find($id);
        $auto->alvazszam = $request->alvazszam;
        $auto->marka = $request->marka;
        $auto->motorkod = $request->motorkod;
        $auto->gyartasiEv = $request->gyartasiEv;
        $auto->gyartasiHo = $request->gyartasiHo;
        $auto->save();
    }

    public function destroy($id)
    {
        Auto::find($id)->delete();
    }
}
