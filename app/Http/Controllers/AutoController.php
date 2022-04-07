<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Models\Auto;
use App\Models\Marka;
use Illuminate\Http\Request;
use App\Rules\rendszam;
use App\Rules\forgalmi;

class AutoController extends Controller
{

//Új autó

public function ujauto()
{
    $markas = Marka::all();
    return view('mvezeto/auto', ['markas' => $markas]);
}

public function auto(Request $request) {
    $rules = [
        'rendszam' => ['required', new rendszam],
        'forgalmi' => ['required', new forgalmi],
    ];
    try{
    $request->validate($rules);
    $auto = new auto();
    $auto -> rendszam = $request -> rendszam;
    $auto -> markaId = $request -> markaId;
    $auto -> forgalmi = $request -> forgalmi;
    $auto -> evjarat = $request -> evjarat;
    $auto->save();
    return redirect('/mvezeto/autok');
}catch(QueryException  $e){
   
    $evjaratures = '';
    $rosszevjarat = '';
    $validator = Validator::make([],[]);
   
    
    if (preg_match("/'evjarat' cannot be null/", $e->getMessage())) {
        $evjaratures = 'A mező kitöltése kötelező!';
    }

    if (preg_match("/Nem megfelelő évjárat!/", $e->getMessage())) {
        $rosszevjarat = 'Nem megfelelő évjárat! Nem lehet 1990-nél kisebb, illetve a mostani évnél nagyobb!';
    }

    
    $validator->errors()->add('evjarat', $evjaratures);
    $validator->errors()->add('evjaratcheck', $rosszevjarat);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/auto')->withErrors($validator);
}
}

//Autók kilistázása

public function autok()
{
    $autos = Auto::all();
    foreach ($autos as $auto) {
        $auto -> marka;
    }
    return view('mvezeto.autok', ['autos' => $autos]);
}

//Autó törlése

public function autotorles($id)
{
    Auto::find($id)->delete();
    return redirect('/mvezeto/autok');
}

//Autó módosítása

public function automodosit(Request $request, $id)
{
    $rules = [
        'rendszam' => ['required', new rendszam],
        'forgalmi' => ['required', new forgalmi],
    ];
    try{
    $request->validate($rules);


    $auto = Auto::find($id);
    $auto -> rendszam = $request -> rendszam;
    $auto -> markaId = $request -> markaId;
    $auto -> forgalmi = $request -> forgalmi;
    $auto -> evjarat = $request -> evjarat;
    $auto->save();

    return redirect('/mvezeto/autok');
} catch (QueryException  $e){
    
    $evjaratures = '';
    $rosszevjarat = '';
    $validator = Validator::make([],[]);
    
    
    if (preg_match("/'evjarat' cannot be null/", $e->getMessage())) {
        $evjaratures = 'A mező kitöltése kötelező!';
    }

    if (preg_match("/Nem megfelelő évjárat!/", $e->getMessage())) {
        $rosszevjarat = 'Nem megfelelő évjárat! Nem lehet 1990-nél kisebb, illetve a mostani évnél nagyobb!';
    }

    
    $validator->errors()->add('evjarat', $evjaratures);
    $validator->errors()->add('evjaratcheck', $rosszevjarat);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/auto')->withErrors($validator);
}

}

public function autoszerkesztes($id)
{
$markas = Marka::all();
$auto = Auto::find($id);
$auto->marka;
return view('mvezeto/automodosit', ['markas' => $markas, 'auto' => $auto]);
}

}
