<?php

namespace App\Http\Controllers;

use App\Models\Beszerzes;
use Illuminate\Http\Request;

class BeszerzesController extends Controller
{
//Új feladat
public function ujr()
{
    return view('mvezeto/rendeles');
}

public function rendeles(Request $request) {
    $beszerzes = new beszerzes();
    $beszerzes -> besz_azon = $request -> besz_azon;
    $beszerzes -> f_szam = $request -> f_szam;
    $beszerzes -> alkatresz = $request -> alkatresz;
    $beszerzes -> beszall_kod = $request -> beszall_kod;
    $beszerzes -> egyseg_ar = $request -> egyseg_ar;
    $beszerzes -> mennyiseg = $request -> mennyiseg;
    $beszerzes -> besz_osszege = $request -> besz_osszege;
    
    $beszerzes->save();

    return redirect('/mvezeto/rendelesek');
}

//Rendelések kilistázása
public function rendelesek()
{
    $beszerzess = Beszerzes::all();
    return view('mvezeto.rendelesek', ['beszerzess' => $beszerzess]);
}

//Rendelés törlése
public function rtorles($id)
{
    Beszerzes::find($id)->delete();
    return redirect('/mvezeto/rendelesek');
}

//Rendelés módosítása
public function rmodosit(Request $request, $id)
{
    $beszerzes = Beszerzes::find($id);
    $beszerzes -> besz_azon = $request -> besz_azon;
    $beszerzes -> f_szam = $request -> f_szam;
    $beszerzes -> alkatresz = $request -> alkatresz;
    $beszerzes -> beszall_kod = $request -> beszall_kod;
    $beszerzes -> egyseg_ar = $request -> egyseg_ar;
    $beszerzes -> mennyiseg = $request -> mennyiseg;
    $beszerzes -> besz_osszege = $request -> besz_osszege;
    
    $beszerzes->save();

    return redirect('/mvezeto/rendelesek');
}
public function rszerkesztes($id)
{
    $beszerzes = Beszerzes::find($id);
    return view('mvezeto/rendelesmodosit', ['beszerzes' => $beszerzes]);
}

//Rendelés mutatása ID szerint
    //public function rmutat($id)
    //{
    //    return Beszerzes::find($id);
    //}
}
