<?php

namespace App\Http\Controllers;

use App\Models\Feladat;
use App\Models\Munkalap;
use App\Models\Dolgozo;
use App\Models\Beszerzes;
use App\Models\Jelleg;
use Illuminate\Http\Request;

class FeladatController extends Controller
{

//Dolgozó

public function dfeladatok()
{

    $feladats=Feladat::all();
        return response()->json($feladats);
}

//Új feladat

public function ujfeladat()
{
    $munkalaps = Munkalap::all();
    $dolgozos = Dolgozo::all();
    $jellegs = Jelleg::all();

    return view('mvezeto/feladat', ['munkalaps' => $munkalaps, 'dolgozos' => $dolgozos, 'jellegs' => $jellegs]);
}

public function feladat(Request $request) {
    $feladat = new Feladat();
    $feladat -> f_szam = $request -> f_szam;
    $feladat -> m_szam = $request -> m_szam;
    $feladat -> jelleg = $request -> jelleg;
    $feladat -> szerelo = $request -> d_kod;
    $feladat -> munkaora = $request -> munkaora;
    $feladat -> f_osszege = $request -> f_osszege;
    $feladat -> besz_osszege = $request -> besz_osszege;
    $feladat->save();

    return redirect('/mvezeto/feladatok');
}

//Feladatok kilistázása

public function feladatok()
{
    $feladats = Feladat::all();
    foreach ($feladats as $feladat) {
        $feladat -> m_szam;
        $feladat -> d_kod;
        $feladat -> jelleg;
    }
    return view('mvezeto.feladatok', ['feladats' => $feladats]);
}
//Feladat törlése
public function feladattorles($id)
{
    
    $besz = Feladat::findOrFail($id);
    if($besz->besz()->count()>0){
        return redirect()->back()->with('error', "Nem törölheted a feladatot, ameddig beszerzés van hozzárendelve!");
    }
    $besz->delete();
    return redirect('/mvezeto/feladatok');
    
}

//Feladat módosítása

public function feladatmodosit(Request $request, $id)
{
    $feladat = Feladat::find($id);
    $feladat -> f_szam = $request -> f_szam;
    $feladat -> m_szam = $request -> m_szam;
    $feladat -> jelleg = $request -> jelleg;
    $feladat -> szerelo = $request -> d_kod;
    $feladat -> munkaora = $request -> munkaora;
    $feladat -> f_osszege = $request -> f_osszege;
    $feladat -> besz_osszege = $request -> besz_osszege;
    $feladat->save();

    return redirect('/mvezeto/feladatok');
}
public function feladatszerkesztes($id)
{
    $munkalaps = Munkalap::all();
    $dolgozos = Dolgozo::all();
    $jellegs = Jelleg::all();
    $feladat = Feladat::find($id);
    $feladat -> m_szam;
    $feladat -> d_kod;
    $feladat -> jelleg;

    return view('mvezeto/feladatmodosit', ['feladat' => $feladat, 'munkalaps' => $munkalaps, 'dolgozos' => $dolgozos, 'jellegs' => $jellegs]);
}

}
