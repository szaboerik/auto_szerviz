<?php

namespace App\Http\Controllers;

use App\Models\Beszallito;
use Illuminate\Http\Request;
use App\Rules\elerhetoseg;

class BeszallitoController extends Controller
{
//Új beszállító

public function ujbeszallito()
{
    return view('mvezeto/beszallito');
} 

public function beszallito(Request $request) {

    $rules = [
        'elerhetoseg' => ['required', new elerhetoseg]
    ];
    $request->validate($rules);

    $beszallito = new Beszallito();
    $beszallito -> beszall_kod = $request -> beszall_kod;
    $beszallito -> nev = $request -> nev;
    $beszallito -> irsz = $request -> irsz;
    $beszallito -> cim = $request -> cim;
    $beszallito -> elerhetoseg = $request -> elerhetoseg;
    $beszallito->save();

    return redirect('/mvezeto/beszallitok');
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
        'elerhetoseg' => ['required', new elerhetoseg]
    ];
    $request->validate($rules);

    $beszallito = Beszallito::find($id);
    $beszallito -> beszall_kod = $request -> beszall_kod;
    $beszallito -> nev = $request -> nev;
    $beszallito -> irsz = $request -> irsz;
    $beszallito -> cim = $request -> cim;
    $beszallito -> elerhetoseg = $request -> elerhetoseg;
    $beszallito->save();

    return redirect('/mvezeto/beszallitok');
}

public function beszallitoszerkesztes($id)
{
    $beszallito = Beszallito::find($id);
    return view('mvezeto/beszallitomodosit', ['beszallito' => $beszallito]);
}

}
