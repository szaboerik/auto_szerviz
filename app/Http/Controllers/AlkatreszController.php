<?php

namespace App\Http\Controllers;

use App\Models\Alkatresz;
use Illuminate\Http\Request;

class AlkatreszController extends Controller
{
//Új Alkatrész
public function ujalkatresz()
{
    return view('mvezeto/alkatresz');
} 
public function alkatresz(Request $request) {
    $alkatresz = new Alkatresz();
    $alkatresz -> alk_azon = $request -> alk_azon;
    $alkatresz -> alk_neve = $request -> alk_neve;
    $alkatresz->save();

    return redirect('/mvezeto/alkatreszek');
}
//Alkatrészek kilistázása
public function alkatreszek()
{
    $alkatreszs = Alkatresz::all();
    return view('mvezeto.alkatreszek', ['alkatreszs' => $alkatreszs]);
}
//Alkatrész törlése
public function alkatresztorles($id)
{
    Alkatresz::find($id)->delete();
    return redirect('/mvezeto/alkatreszek');
}
//Alkatrész módosítása
public function alkatreszmodosit(Request $request, $id)
{
    $alkatresz = Alkatresz::find($id);
    $alkatresz -> alk_azon = $request -> alk_azon;
    $alkatresz -> alk_neve = $request -> alk_neve;
    $alkatresz->save();

    return redirect('/mvezeto/alkatreszek');
}
public function alkatreszszerkesztes($id)
{
    $alkatresz = Alkatresz::find($id);
    return view('mvezeto/alkatreszmodosit', ['alkatresz' => $alkatresz]);
}
//Alkatrész mutatása ID szerint
    //public function alkatreszmutat($id)
    //{
    //    return Alkatresz::find($id);
    //}
}
