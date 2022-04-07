<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Models\Marka;
use Illuminate\Http\Request;

class MarkaController extends Controller
{

//Új márka

public function ujmarka()
{   
    return view('mvezeto/marka');
}

public function marka(Request $request) {
    try{
    $marka = new Marka();
    $marka -> marka = $request -> marka;
    $marka->save();
    return redirect('/mvezeto/markak');
    }catch(QueryException  $e){
    $message = '';
    $markadup = '';
    $validator = Validator::make([],[]);
    if (preg_match("/'marka' cannot be null/", $e->getMessage())) {
        $message = 'A mező kitöltése kötelező!';
    }
    if (preg_match("/Duplicate entry/", $e->getMessage())) {
        $markadup = 'Van már ilyen elnevezésű márkád!';
    }
    //$message = explode('>>: ', $e->getPrevious()->getMessage());
    $validator->errors()->add('marka', $message);
    $validator->errors()->add('markadup', $markadup);
 //   return redirect('/mvezeto/jellegek')->withErrors($validator);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/marka')->withErrors($validator);
}

}

//Márkák kilistázása

public function markak()
{
    $markas = Marka::all();
    return view('mvezeto.markak', ['markas' => $markas]);
}

//Márka törlése

public function markatorles($id)
{
    Marka::find($id)->delete();
    return redirect('/mvezeto/markak');
}

//Márka módosítása

public function markamodosit(Request $request, $id)
{
    try{
    $marka = marka::find($id);
    $marka -> marka = $request -> marka;
    $marka->save();

    return redirect('/mvezeto/markak');
} catch(QueryException  $e){
    $message = '';
    $markadup = '';
    $validator = Validator::make([],[]);
    if (preg_match("/'marka' cannot be null/", $e->getMessage())) {
        $message = 'A mező kitöltése kötelező!';
    }
    if (preg_match("/Duplicate entry/", $e->getMessage())) {
        $markadup = 'Van már ilyen elnevezésű márkád!';
    }
    //$message = explode('>>: ', $e->getPrevious()->getMessage());
    $validator->errors()->add('marka', $message);
    $validator->errors()->add('markadup', $markadup);
 //   return redirect('/mvezeto/jellegek')->withErrors($validator);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/marka')->withErrors($validator);
}

}

public function markaszerkesztes($id)
{
    $marka = Marka::find($id);
    return view('mvezeto/markamodosit', ['marka' => $marka]);
}

}
