<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

use App\Models\Munkalap;
use App\Models\Auto;
use App\Models\Feladat;
use Illuminate\Http\Request;
use App\Rules\ugyfel_telszama;

class MunkalapController extends Controller
{

//Új munkalap

public function ujMunkalap()
{
    $autos = Auto::all();
    return view('mvezeto/munkalap', ['autos' => $autos]);
}

public function munkalap(Request $request) {

    $rules = [
        'ugyfel_telszama' => ['required', new ugyfel_telszama]
    ];
    try{
    $request->validate($rules);

    $munkalap = new Munkalap();
    
    $munkalap -> ugyfel_neve = $request -> ugyfel_neve;
    $munkalap -> ugyfel_telszama = $request -> ugyfel_telszama;
    $munkalap->autoId = $request->rendszam;
    $munkalap->save();

    return redirect('/mvezeto/munkak');
}catch(QueryException  $e){
    $ugyfel = '';
    
    $munkarsz = '';
    $validator = Validator::make([],[]);
    if (preg_match("/'ugyfel_neve' cannot be null/", $e->getMessage())) {
        $ugyfel = 'A mező kitöltése kötelező!';
    
    }
    
    if (preg_match("/Egy nap egy autó csak egy munkalapra vihető fel!/", $e->getMessage())) {
        $munkarsz = 'Egy nap egy autó csak egy munkalapra vihető fel!';
    
    }

    $validator->errors()->add('ugyfelnev', $ugyfel);
   
    $validator->errors()->add('rsz', $munkarsz);

 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/munkalap')->withErrors($validator);
}

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

public function munkalapTorles($id)
{
    
    $munkalap = Munkalap::findOrFail($id);
    if($munkalap->feladat()->count()>0){
        return redirect()->back()->with('error', "Nem törölheted a munkalapot, ameddig feladat van hozzárendelve!");
    }
    
    $munkalap->delete();
    return redirect('/mvezeto/munkak');
} 
    




//Munkalap módosítása

public function munkalapModosit(Request $request, $id)
{

    $rules = [
        'ugyfel_telszama' => ['required', new ugyfel_telszama]
    ];
try{
    $request->validate($rules);

    $munkalap = Munkalap::find($id);
    
    $munkalap -> ugyfel_neve = $request -> ugyfel_neve;
    $munkalap -> ugyfel_telszama = $request -> ugyfel_telszama;
    $munkalap->autoId = $request->rendszam;
    
    $munkalap -> munka_vege = $request -> munka_vege;
    
    $munkalap->save();

    return redirect('/mvezeto/munkak');
}catch(QueryException  $e){
    $ugyfel = '';
    $munkavege = '';
    $munkarsz = '';
    
    $validator = Validator::make([],[]);
    if (preg_match("/'ugyfel_neve' cannot be null/", $e->getMessage())) {
        $ugyfel = 'A mező kitöltése kötelező!';
    
    }
    if (preg_match("/Nem lehet a mai napon kívül más a munka vége dátum!/", $e->getMessage())) {
        $munkavege = 'Nem lehet a mai napon kívül más a munka vége dátum!';
    
    }
    if (preg_match("/Egy nap egy autó csak egy munkalapra vihető fel!/", $e->getMessage())) {
        $munkarsz = 'Egy nap egy autó csak egy munkalapra vihető fel!';
    
    }

    

    $validator->errors()->add('ugyfelnev', $ugyfel);
    $validator->errors()->add('vege', $munkavege);
    $validator->errors()->add('rsz', $munkarsz);
    

 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/munkalap')->withErrors($validator);
}

}

public function munkalapSzerkesztes($id)
{
    $autos = Auto::all();
    $munkalap = Munkalap::find($id);
    $munkalap->auto;
    return view('mvezeto/munkamodosit', ['autos' => $autos, 'munkalap' => $munkalap]);
}

/*public function munkabefejezes($id)
{
    $munkalap = Munkalap::find($id);
    $munkalap -> munka_vege = now();
    $munkalap->save();

    return redirect('/mvezeto/munkak');
}*/


 
}
