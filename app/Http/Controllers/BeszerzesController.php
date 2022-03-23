<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beszerzes;
use App\Models\Feladat;
use App\Models\Alkatresz;
use App\Models\Beszallito;

class BeszerzesController extends Controller
{

//Új beszerzés

public function ujbeszerzes()
{
    $feladats = Feladat::all();
    $alkatreszs = Alkatresz::all();
    $beszallitos = Beszallito::all();
    return view('mvezeto/beszerzes', ['feladats' => $feladats, 'alkatreszs' => $alkatreszs, 'beszallitos' => $beszallitos]);
}

public function beszerzes(Request $request) {
    $beszerzes = new beszerzes();
    $beszerzes -> besz_azon = $request -> besz_azon;
    $beszerzes -> f_szam = $request -> f_szam;
    $beszerzes -> alkatresz = $request -> alk_azon;
    $beszerzes -> beszall_kod = $request -> beszall_kod;
    $beszerzes -> egyseg_ar = $request -> egyseg_ar;
    $beszerzes -> mennyiseg = $request -> mennyiseg;
    $beszerzes -> besz_osszege = $request -> besz_osszege;
    $beszerzes->save();

    return redirect('/mvezeto/beszerzesek');
}

//Rendelések kilistázása
public function beszerzesek()
{
    $beszerzess = Beszerzes::all();
    foreach ($beszerzess as $beszerzes) {
        $beszerzes -> alkatresz;
        $beszerzes -> f_szam;
        $beszerzes -> beszall_kod;
    }
    return view('mvezeto.beszerzesek', ['beszerzess' => $beszerzess]);
}

//Rendelés törlése

public function beszerzestorles($id)
{
    Beszerzes::find($id)->delete();
    return redirect('/mvezeto/beszerzesek');
}

//Rendelés módosítása

public function beszerzesmodosit(Request $request, $id)
{
    $beszerzes = Beszerzes::find($id);
    $beszerzes -> besz_azon = $request -> besz_azon;
    $beszerzes -> f_szam = $request -> f_szam;
    $beszerzes -> alkatresz = $request -> alk_azon;
    $beszerzes -> beszall_kod = $request -> beszall_kod;
    $beszerzes -> egyseg_ar = $request -> egyseg_ar;
    $beszerzes -> mennyiseg = $request -> mennyiseg;
    $beszerzes -> besz_osszege = $request -> besz_osszege;
    $beszerzes->save();

    return redirect('/mvezeto/beszerzesek');
}

public function beszerzesszerkesztes($id)
{
    $feladats = Feladat::all();
    $alkatreszs = Alkatresz::all();
    $beszallitos = Beszallito::all();
    $beszerzes = Beszerzes::find($id);
    $beszerzes -> f_szam;
    $beszerzes -> alk_azon;
    $beszerzes -> beszall_kod;

    return view('mvezeto/beszerzesmodosit', ['beszerzes' => $beszerzes, 'feladats' => $feladats, 'alkatreszs' => $alkatreszs, 'beszallitos' => $beszallitos]);
}

}
