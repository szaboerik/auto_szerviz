<?php

namespace App\Http\Controllers;

use App\Models\Feladat;
use App\Models\Munkalap;
use App\Models\Dolgozo;
use App\Models\Jelleg;
use Illuminate\Http\Request;
use App\Rules\m_szam;
use App\Rules\d_kod;
//use App\Rules\d_jelleg;

class FeladatController extends Controller
{
//Dolgozó
//-------------------------
public function dfeladatok()
{

    $feladats=Feladat::all();
        return response()->json($feladats);
}


//Új feladat
public function ujf()
{
    $munkalaps = Munkalap::all();
    $dolgozos = Dolgozo::all();
    //$jellegs = Jelleg::all();
return view('mvezeto/feladat', ['munkalaps' => $munkalaps, 'dolgozos' => $dolgozos/*, $jellegs => 'jellegs'*/]);
}

public function feladat(Request $request) {
    $feladat = new Feladat();
    $feladat -> f_szam = $request -> f_szam;
    $feladat -> m_szam = $request -> m_szam;
    $feladat -> jelleg = $request -> jelleg;
    $feladat -> szerelo = $request -> d_kod;
    $feladat -> munkaora = $request -> munkaora;
    
    $feladat->save();

    $rules = [
        'm_szam' => ['required', new m_szam],
        'd_kod' => ['required', new d_kod],
        //'jelleg' => ['required', new d_jelleg],
    ];

    return redirect('/mvezeto/feladatok');
}
//Feladatok kilistázása
public function feladatok()
{
    $feladats = Feladat::all();
    foreach ($feladats as $feladat) {
        $feladat -> m_szam;
        $feladat -> d_kod;
       // $feladat -> jelleg;
    }
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
    $feladat -> szerelo = $request -> d_kod;
    $feladat -> munkaora = $request -> munkaora;
    
    $feladat->save();

    return redirect('/mvezeto/feladatok');
}
public function fszerkesztes($id)
{
    $munkalaps = Munkalap::all();
    $dolgozos = Dolgozo::all();
   // $jellegs = Jelleg::all();
    $feladat = Feladat::find($id);
    $feladat -> m_szam;
    $feladat -> d_kod;
    //$feladat -> jelleg;
    return view('mvezeto/feladatmodosit', ['feladat' => $feladat, 'munkalaps' => $munkalaps, 'dolgozos' => $dolgozos/*, $jellegs => 'jellegs'*/]);
}

//Feladat mutatása ID szerint
//public function fmutat($id)
//{
//    return Feladat::find($id);
//}

}
