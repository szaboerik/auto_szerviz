<?php

namespace App\Http\Controllers;

use App\Models\Jelleg;
use Illuminate\Http\Request;

class JellegController extends Controller
{

//Új jelleg
public function ujj()
{
    return view('mvezeto/jelleg');
}

public function jelleg(Request $request) {
    $jelleg = new Jelleg();
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
    
    $jellegek = Jelleg::all();
    return view('mvezeto.jellegek', ['jellegek' => $jellegek]);
}
//Jelleg törlése
public function jtorles($id)
{
    Jelleg::find($id)->delete();
    return redirect('/mvezeto/jellegek');
}

//Jelleg módosítása
public function jmodosit(Request $request, $id)
{
    $jelleg = Jelleg::find($id);
    $jelleg -> jelleg = $request -> jelleg;
    $jelleg -> anyag_e = $request -> anyag_e;
    $jelleg -> elnevezes = $request -> elnevezes;
    $jelleg -> oradij = $request -> oradij;
    $jelleg->save();

    return redirect('/mvezeto/jellegek');
}
public function jszerkesztes($id)
{
    $jelleg = Jelleg::find($id);
    return view('mvezeto/jellegmodosit', ['jelleg' => $jelleg]);
    }
}
