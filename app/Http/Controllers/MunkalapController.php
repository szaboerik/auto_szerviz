<?php

namespace App\Http\Controllers;

use App\Models\Munkalap;
use App\Models\Auto;
use Illuminate\Http\Request;

class MunkalapController extends Controller
{

//Új munkalap

public function ujmunkalap()
{
    $autos = Auto::all();
    return view('mvezeto/munkalap', ['autos' => $autos]);
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

public function munkalaptorles($id)
{
    Munkalap::find($id)->delete();
    return redirect('/mvezeto/munkak');
}

//Munkalap módosítása

public function munkalapmodosit(Request $request, $id)
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
public function munkalapszerkesztes($id)
{
    $autos = Auto::all();
    $munkalap = Munkalap::find($id);
    $munkalap->auto;
    return view('mvezeto/munkamodosit', ['autos' => $autos, 'munkalap' => $munkalap]);
}

}
