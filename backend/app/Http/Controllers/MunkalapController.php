<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Munkalap;
use Illuminate\Http\Request;

class MunkalapController extends Controller
{
    public function index()
    {

        $munkalap = response()->json(Munkalap::all());
        return $munkalap;
    }

    public function show($id)
    {
        $munkalap = response()->json(Munkalap::find($id));
        return $munkalap;
    }

    public function store(Request $request)
    {
        $munkalap = new Munkalap();
        $munkalap->auto = $request->auto;
        $munkalap->munkafelvetelIdeje = $request->munkafelvetelIdeje;
        $munkalap->leiras = $request->leiras;
        $munkalap->ugyfel = $request->ugyfel;
        $munkalap->munkavezeto = $request->munkavezeto;
        $munkalap->kesz = $request->kesz;
        $munkalap->osszeg = $request->osszeg;
        $munkalap->elvitelIdeje = $request->elvitelIdeje;
        $munkalap->save();
    }

    public function update($id, Request $request)
    {
        $munkalap = Munkalap::find($id);
        $munkalap->auto = $request->auto;
        $munkalap->munkafelvetelIdeje = $request->munkafelvetelIdeje;
        $munkalap->leiras = $request->leiras;
        $munkalap->ugyfel = $request->ugyfel;
        $munkalap->munkavezeto = $request->munkavezeto;
        $munkalap->kesz = $request->kesz;
        $munkalap->osszeg = $request->osszeg;
        $munkalap->elvitelIdeje = $request->elvitelIdeje;
        $munkalap->save();
    }

    public function destroy($id)
    {
        Munkalap::find($id)->delete();
    }
}
