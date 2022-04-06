<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Dolgozo;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class DolgozoController extends Controller
{

//Új dolgozó

public function ujdolgozo()
{
    return view('mvezeto/dolgozo');
} 

public function dolgozo(Request $request) {
    try{
    $dolgozo = new Dolgozo();
    $dolgozo -> d_kod = $request -> d_kod;
    $dolgozo -> dolg_nev = $request -> dolg_nev;
    $dolgozo -> kepesseg = $request -> kepesseg;
    $dolgozo->save();
    return redirect('/mvezeto/dolgozok');
}catch(QueryException  $e){
    $message = '';
    $validator = Validator::make([],[]);
    if (preg_match("/'dolg_nev' cannot be null/", $e->getMessage())) {
        $message = 'A mező kitöltése kötelező!';
    
    }

    $validator->errors()->add('dolgozo', $message);

 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/dolgozo')->withErrors($validator);
}

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
    Dolgozo::find($id)->delete();
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

}
