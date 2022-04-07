<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
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
    try{
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
}catch(QueryException $e){
   
    $egysegar = '';
    $menny = '';
    $mennyvizsg = '';
    $egysegarvizsg = '';
    $validator = Validator::make([],[]);
   
    
    if (preg_match("/'egyseg_ar' cannot be null/", $e->getMessage())) {
        $egysegar = 'A mező kitöltése kötelező!';
    }

    if (preg_match("/'mennyiseg' cannot be null/", $e->getMessage())) {
        $menny = 'A mező kitöltése kötelező!';
    }

    if (preg_match("/Nem lehet 0 vagy kisebb a mennyiség!/", $e->getMessage())) {
        $mennyvizsg = 'Nem lehet 0 vagy kisebb a mennyiség!';
    }

    if (preg_match("/Nem lehet 0 vagy kisebb az egységár!/", $e->getMessage())) {
        $egysegarvizsg = 'Nem lehet 0 vagy kisebb az egységár!';
    }
    
    $validator->errors()->add('egysegar', $egysegar);
    $validator->errors()->add('mennyiseg', $menny);
    $validator->errors()->add('mennyisegv', $mennyvizsg);
    $validator->errors()->add('egysegarv', $egysegarvizsg);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/beszerzes')->withErrors($validator);
}
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
    try{
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
}catch(QueryException $e){
   
    $egysegar = '';
    $menny = '';
    $mennyvizsg = '';
    $egysegarvizsg = '';
    $validator = Validator::make([],[]);
   
    
    if (preg_match("/'egyseg_ar' cannot be null/", $e->getMessage())) {
        $egysegar = 'A mező kitöltése kötelező!';
    }

    if (preg_match("/'mennyiseg' cannot be null/", $e->getMessage())) {
        $menny = 'A mező kitöltése kötelező!';
    }

    if (preg_match("/Nem lehet 0 vagy kisebb a mennyiség!/", $e->getMessage())) {
        $mennyvizsg = 'Nem lehet 0 vagy kisebb a mennyiség!';
    }

    if (preg_match("/Nem lehet 0 vagy kisebb az egységár!/", $e->getMessage())) {
        $egysegarvizsg = 'Nem lehet 0 vagy kisebb az egységár!';
    }

    
    $validator->errors()->add('egysegar', $egysegar);
    $validator->errors()->add('mennyiseg', $menny);
    $validator->errors()->add('mennyisegv', $mennyvizsg);
    $validator->errors()->add('egysegarv', $egysegarvizsg);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/beszerzes')->withErrors($validator);
}
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
