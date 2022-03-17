<?php

namespace App\Http\Controllers;

use App\Models\Jellegek;
use Illuminate\Http\Request;

class JellegController extends Controller
{

//Új jelleg
public function ujj()
{
    return view('mvezeto/jelleg');
}

public function jelleg(Request $request) {
    $jelleg = new jellegek();
    $jelleg -> jelleg = $request -> jelleg;
    $jelleg -> anyag_e = $request -> anyag_e;
    $jelleg -> elnevezes = $request -> elnevezes;
    $jelleg -> oradij = $request -> oradij;
    $jelleg->save();

    return redirect('/mvezeto/jellegek');
}
//Jellegek kilistázása
public function jellegek()
{
    
    $jellegek = Jellegek::all();
    return view('mvezeto.jellegek', ['jellegek' => $jellegek]);
}
//Jelleg törlése
public function jtorles($id)
{
    Jellegek::find($id)->delete();
    return redirect('/mvezeto/jellegek');
}

//Jelleg módosítása
public function jmodosit(Request $request, $id)
{
    $jelleg = Jellegek::find($id);
    $jelleg -> jelleg = $request -> jelleg;
    $jelleg -> anyag_e = $request -> anyag_e;
    $jelleg -> elnevezes = $request -> elnevezes;
    $jelleg -> oradij = $request -> oradij;
    $jelleg->save();

    return redirect('/mvezeto/jellegek');
}
public function jszerkesztes($id)
{
    $jelleg = Jellegek::find($id);
    return view('mvezeto/jellegmodosit', ['jelleg' => $jelleg]);
}



}
