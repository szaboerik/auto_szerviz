<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Feladat;
use App\Models\Munkalap;
use App\Models\Dolgozo;
use App\Models\Beszerzes;
use App\Models\Jelleg;
use App\Models\Auto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FeladatController extends Controller
{

//Dolgozó

public function dfeladatok()
{

    $feladats=Feladat::all();
    return response()->json($feladats);
}

//Feladatra szűrés

public function dfeladat($id)
{
    $feladats=Feladat::find($id);
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
    try{
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
}catch(QueryException  $e){
    $csakszerelo = '';
    $munkaoranotnull = '';
    $szerelomaxmunkaora ='';
    $szerelominmunkaora ='';
    $feladatmaxoraszam = '';
    $befejezettmunkalap = '';
    $jelleg= '';

    $validator = Validator::make([],[]);

    if (preg_match("/csak szerelő/", $e->getMessage())) {
        $csakszerelo = 'A feladathoz csak szerelő (s) vihető fel! A jelenleg kiválasztott dolgozó vezető (v)!';
    }
    
    if (preg_match("/'munkaora' cannot be null/", $e->getMessage())) {
        $munkaoranotnull = 'A mező kitöltése kötelező!';
    }
    if (preg_match("/A dolgozó egy nap nem dolgozhat 8 óránál többet!/", $e->getMessage())) {
        $szerelomaxmunkaora = 'A dolgozó egy nap nem dolgozhat 8 óránál többet!';
    }
    if (preg_match("/Nem lehet 0 vagy kisebb a munkaóra!/", $e->getMessage())) {
        $szerelominmunkaora = 'Nem lehet 0 vagy kisebb a munkaóra!';
    }
    if (preg_match("/Egy munkalaphoz tartozó feladatok óraszáma nem lehet egy nap 8 óránál több!/", $e->getMessage())) {
        $feladatmaxoraszam = 'Egy munkalaphoz tartozó feladatok óraszáma nem lehet egy nap 8 óránál több!';
    }
    if (preg_match("/Befejezett munkalaphoz nem rendelhető feladat!/", $e->getMessage())) {
        $befejezettmunkalap= 'Befejezett munkalaphoz nem rendelhető feladat!';
    }
    if (preg_match("/Egy munkalaphoz csak egyféle jellegű feladat csatolható!/", $e->getMessage())) {
        $jelleg= 'Egy munkalaphoz csak egyféle jellegű feladat csatolható!';
    }

    $validator->errors()->add('szerelo', $csakszerelo);
    $validator->errors()->add('munkaoranotnull', $munkaoranotnull);
    $validator->errors()->add('szerelomaxmunkora', $szerelomaxmunkaora);
    $validator->errors()->add('szerelominmunkaora', $szerelominmunkaora);
    $validator->errors()->add('feladatmaxoraszam', $feladatmaxoraszam);
    $validator->errors()->add('befejezettmunkalap', $befejezettmunkalap);
    $validator->errors()->add('jelleg', $jelleg);

    return redirect()->back()->withErrors($validator)->withInput($request->input());
    return redirect('/mvezeto/feladat')->withErrors($validator);
}
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
    try{
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
    }catch(QueryException  $e){
        $csakszerelo = '';
        $munkaoranotnull = '';
        $szerelomaxmunkaora ='';
        $szerelominmunkaora ='';
        $feladatmaxoraszam = '';
        $befejezettmunkalap = '';
        $jelleg = '';
    
        $validator = Validator::make([],[]);
    
        if (preg_match("/csak szerelő/", $e->getMessage())) {
            $csakszerelo = 'A feladathoz csak szerelő (s) vihető fel!';
        }
        
        if (preg_match("/'munkaora' cannot be null/", $e->getMessage())) {
            $munkaoranotnull = 'A mező kitöltése kötelező!';
        }
        if (preg_match("/A dolgozó egy nap nem dolgozhat 8 óránál többet!/", $e->getMessage())) {
            $szerelomaxmunkaora = 'A dolgozó egy nap nem dolgozhat 8 óránál többet!';
        }
        if (preg_match("/Nem lehet 0 vagy kisebb a munkaóra!/", $e->getMessage())) {
            $szerelominmunkaora = 'Nem lehet 0 vagy kisebb a munkaóra!';
        }
        if (preg_match("/Egy munkalaphoz tartozó feladatok óraszáma nem lehet egy nap 8 óránál több!/", $e->getMessage())) {
            $feladatmaxoraszam = 'Egy munkalaphoz tartozó feladatok óraszáma nem lehet egy nap 8 óránál több!';
        }
        if (preg_match("/Befejezett munkalaphoz nem rendelhető feladat!/", $e->getMessage())) {
            $befejezettmunkalap= 'Befejezett munkalaphoz nem rendelhető feladat!';
        }
        if (preg_match("/Egy munkalaphoz csak egyféle jellegű feladat csatolható!/", $e->getMessage())) {
            $jelleg= 'Egy munkalaphoz csak egyféle jellegű feladat csatolható!';
        }
    
        $validator->errors()->add('szerelo', $csakszerelo);
        $validator->errors()->add('munkaoranotnull', $munkaoranotnull);
        $validator->errors()->add('szerelomaxmunkora', $szerelomaxmunkaora);
        $validator->errors()->add('szerelominmunkaora', $szerelominmunkaora);
        $validator->errors()->add('feladatmaxoraszam', $feladatmaxoraszam);
        $validator->errors()->add('befejezettmunkalap', $befejezettmunkalap);
        $validator->errors()->add('jelleg', $jelleg);
    
        return redirect()->back()->withErrors($validator)->withInput($request->input());
        return redirect('/mvezeto/feladat')->withErrors($validator);
    }
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
