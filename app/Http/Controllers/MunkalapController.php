<?php

namespace App\Http\Controllers;

use App\Models\Munkalap;
use App\Models\Autok;
use Illuminate\Http\Request;

class MunkalapController extends Controller
{
//Új munkalap
public function ujm()
{
    $autoks = Autok::all();
    return view('mvezeto/munkalap', ['autoks' => $autoks]);
}

public function munkalap(Request $request) {
    $munkalap = new Munkalap();
    $munkalap -> m_szam = $request -> m_szam;
    $munkalap -> ugyfel_neve = $request -> ugyfel_neve;
    $munkalap -> ugyfel_telszama = $request -> ugyfel_telszama;
    $munkalap->autoId = $request->rendszam;
    $munkalap -> munka_kezdete = $request -> munka_kezdete;
    $munkalap -> munka_vege = $request -> munka_vege;
    $munkalap -> fizetendo = $request -> fizetendo;
    $munkalap->save();

    return redirect('/mvezeto/munkak');
}

//Munkalapok kilistázása
public function munkak()
{
    $munkalaps = Munkalap::all();
    foreach ($munkalaps as $munkalap) {
        $munkalap -> auto;
    }
    return view('mvezeto.munkak', ['munkalaps' => $munkalaps]);
}

//Munkalap törlése
public function mtorles($id)
{
    Munkalap::find($id)->delete();
    return redirect('/mvezeto/munkak');
}

//Munkalap módosítása
public function mmodosit(Request $request, $id)
{
    $munkalap = Munkalap::find($id);
    $munkalap -> m_szam = $request -> m_szam;
    $munkalap -> ugyfel_neve = $request -> ugyfel_neve;
    $munkalap -> ugyfel_telszama = $request -> ugyfel_telszama;
    $munkalap->autoId = $request->rendszam;
    $munkalap -> munka_kezdete = $request -> munka_kezdete;
    $munkalap -> munka_vege = $request -> munka_vege;
    $munkalap -> fizetendo = $request -> fizetendo;
    $munkalap->save();

    return redirect('/mvezeto/munkak');
}
public function mszerkesztes($id)
{
    $autoks = Autok::all();
    $munkalap = Munkalap::find($id);
    $munkalap->auto;
    return view('mvezeto/munkamodosit', ['autoks' => $autoks, 'munkalap' => $munkalap]);
}

//Munkalap mutatása ID szerint
    //public function mmutat($id)
    //{
    //    return munkalap::find($id);
    //}
}
