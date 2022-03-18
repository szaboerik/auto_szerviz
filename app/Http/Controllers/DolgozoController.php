<?php

namespace App\Http\Controllers;

use App\Models\Dolgozo;
use Illuminate\Http\Request;

class DolgozoController extends Controller
{
//Új dolgozó
public function ujdolgozo()
{
    return view('mvezeto/dolgozo');
} 
public function dolgozo(Request $request) {
    $dolgozo = new Dolgozo();
    $dolgozo -> d_kod = $request -> d_kod;
    $dolgozo -> dolg_nev = $request -> dolg_nev;
    $dolgozo -> kepesseg = $request -> kepesseg;
    $dolgozo->save();

    return redirect('/mvezeto/dolgozok');
}
//Dolgozók kilistázása
public function dolgozok()
{
    $dolgozos = Dolgozo::all();
    return view('mvezeto.dolgozok', ['dolgozos' => $dolgozos]);
}
//Dolgozó törlése
public function dolgozotorles($id)
{
    dolgozo::find($id)->delete();
    return redirect('/mvezeto/dolgozok');
}
//Dolgozó módosítása
public function dolgozomodosit(Request $request, $id)
{
    $dolgozo = Dolgozo::find($id);
    $dolgozo -> d_kod = $request -> d_kod;
    $dolgozo -> dolg_nev = $request -> dolg_nev;
    $dolgozo -> kepesseg = $request -> kepesseg;
    $dolgozo->save();

    return redirect('/mvezeto/dolgozok');
}
public function dolgozoszerkesztes($id)
{
    $dolgozo = Dolgozo::find($id);
    return view('mvezeto/dolgozomodosit', ['dolgozo' => $dolgozo]);
}
//Dolgozó mutatása ID szerint
    //public function dolgozomutat($id)
    //{
    //    return Dolgozo::find($id);
    //}
}
