<?php

namespace App\Http\Controllers;

use App\Models\Feladat;
use Illuminate\Http\Request;

class FeladatController extends Controller
{
//Dolgozó
//-------------------------
public function dfeladatok()
{
    $feladats = feladat::all();
    return view('dolgozo.dfeladatok', ['feladats' => $feladats]);
}
//Új feladat
public function ujf()
{
    return view('mvezeto/feladat');
}

public function feladat(Request $request) {
    $feladat = new Feladat();
    $feladat -> f_szam = $request -> f_szam;
    $feladat -> m_szam = $request -> m_szam;
    $feladat -> jelleg = $request -> jelleg;
    $feladat -> szerelo = $request -> szerelo;
    $feladat -> munkaora = $request -> munkaora;
    $feladat -> besz_osszege = $request -> besz_osszege;
    $feladat->save();

    return redirect('/mvezeto/feladatok');
}
//Feladatok kilistázása
public function feladatok()
{
    //Itt majd a feladats kell átírni a táblázat nevére, egyenlőre így működik
    $feladats = Feladat::all();
    return view('mvezeto.feladatok', ['feladats' => $feladats]);
}
//Feladat törlése
public function ftorles($id)
{
    Feladat::find($id)->delete();
    return redirect('/mvezeto/feladatok');
}

//Feladat módosítása
public function fmodosit(Request $request, $id)
{
    $feladat = Feladat::find($id);
    $feladat -> f_szam = $request -> f_szam;
    $feladat -> m_szam = $request -> m_szam;
    $feladat -> jelleg = $request -> jelleg;
    $feladat -> szerelo = $request -> szerelo;
    $feladat -> munkaora = $request -> munkaora;
    $feladat -> besz_osszege = $request -> besz_osszege;
    $feladat->save();

    return redirect('/mvezeto/feladatok');
}
public function fszerkesztes($id)
{
    $feladat = Feladat::find($id);
    return view('mvezeto/feladatmodosit', ['feladat' => $feladat]);
}

//Feladat mutatása ID szerint
//public function fmutat($id)
//{
//    return Feladat::find($id);
//}

}
