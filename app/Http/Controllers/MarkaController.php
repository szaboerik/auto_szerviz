<?php

namespace App\Http\Controllers;

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
    $marka = new Marka();
    $marka -> marka = $request -> marka;
    $marka->save();

    return redirect('/mvezeto/markak');
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
    $marka = marka::find($id);
    $marka -> marka = $request -> marka;
    $marka->save();

    return redirect('/mvezeto/markak');
}
public function markaszerkesztes($id)
{
    $marka = Marka::find($id);
    return view('mvezeto/markamodosit', ['marka' => $marka]);
}

//marka mutatása ID szerint
//public function markamutat($id)
//{
//    return Marka::find($id);
//}
}
