<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $user = response()->json(User::all());
        return $user;
    }

    public function show($id){
        $user = response()->json(User::find($id));
        return $user;
    }

    public function store(Request $request){
        $user = new User();
        $user->nev=$request->nev;
        $user->szuletesiIdo=$request->szuletesiIdo;
        $user->lakcim=$request->lakcim;
        $user->telefonszam=$request->telefonszam;
        $user->email=$request->email;
        $user->jogosultsag=$request->jogosultsag;
        $user->password=Hash::make($request->password);
        $user->save();
    }

    public function update($id,Request $request){
        $user = User::find($id);
        $user->nev=$request->nev;
        $user->szuletesiIdo=$request->szuletesiIdo;
        $user->lakcim=$request->lakcim;
        $user->telefonszam=$request->telefonszam;
        $user->email=$request->email;
        $user->jogosultsag=$request->jogosultsag;
        $user->save();
    }

    public function destroy($id){
        User::find($id)->delete();
    }
}
