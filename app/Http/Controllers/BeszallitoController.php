<?php

namespace App\Http\Controllers;

use App\Models\Beszallito;
use Illuminate\Http\Request;
use App\Rules\elerhetoseg;
use App\Rules\irszam;

class BeszallitoController extends Controller
{
//Új beszállító

public function ujbeszallito()
{
    return view('mvezeto/beszallito');
} 

public function beszallito(Request $request) {

    $rules = [
        'elerhetoseg' => ['required', new elerhetoseg],
        'irsz' => ['required', new irszam]
    ];

    try{
    $request->validate($rules);

    $beszallito = new Beszallito();
    $beszallito -> beszall_kod = $request -> beszall_kod;
    $beszallito -> nev = $request -> nev;
    $beszallito -> irsz = $request -> irsz;
    $beszallito -> cim = $request -> cim;
    $beszallito -> elerhetoseg = $request -> elerhetoseg;
    $beszallito->save();
    return redirect('/mvezeto/beszallitok');
}catch(QueryException  $e){
    $message = '';
    $nev = '';
    $cim = '';
    $validator = Validator::make([],[]);
    
    if (preg_match("/field is required/", $e->getMessage())) {
        $message = 'A mező kitöltése kötelező!';
    }
    
    if (preg_match("/'nev' cannot be null/", $e->getMessage())) {
        $nev = 'A mező kitöltése kötelező!';
    }
    
    if (preg_match("/'cim' cannot be null/", $e->getMessage())) {
        $cim = 'A mező kitöltése kötelező!';
    }

    $validator->errors()->add('beszallito', $message);
    $validator->errors()->add('neve', $nev);
    $validator->errors()->add('cime', $cim);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/beszallito')->withErrors($validator);
}
}

//Beszállítók kilistázása

public function beszallitok()
{
    $beszallitos = Beszallito::all();
    return view('mvezeto.beszallitok', ['beszallitos' => $beszallitos]);
}

//Beszállító törlése

public function beszallitotorles($id)
{
    Beszallito::find($id)->delete();
    return redirect('/mvezeto/beszallitok');
}

//Beszállító módosítása

public function beszallitomodosit(Request $request, $id)
{

    $rules = [
        'elerhetoseg' => ['required', new elerhetoseg],
        'irsz' => ['required', new irszam]
    ];
    try{
    $request->validate($rules);

    $beszallito = Beszallito::find($id);
    $beszallito -> beszall_kod = $request -> beszall_kod;
    $beszallito -> nev = $request -> nev;
    $beszallito -> irsz = $request -> irsz;
    $beszallito -> cim = $request -> cim;
    $beszallito -> elerhetoseg = $request -> elerhetoseg;
    $beszallito->save();

    return redirect('/mvezeto/beszallitok');
}catch(QueryException  $e){
    $message = '';
    $nev = '';
    $cim = '';
   
    $validator = Validator::make([],[]);

    if (preg_match("/field is required/", $e->getMessage())) {
        $message = 'A mező kitöltése kötelező!';
    }
    if (preg_match("/'nev' cannot be null/", $e->getMessage())) {
        $nev = 'A mező kitöltése kötelező!';
    }
    
    if (preg_match("/'cim' cannot be null/", $e->getMessage())) {
        $cim = 'A mező kitöltése kötelező!';
    }
    $validator->errors()->add('beszallito', $message);
    $validator->errors()->add('neve', $nev);
    $validator->errors()->add('cime', $cim);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/beszallito')->withErrors($validator);
}
}

public function beszallitoszerkesztes($id)
{
    $beszallito = Beszallito::find($id);
    return view('mvezeto/beszallitomodosit', ['beszallito' => $beszallito]);
}

}
