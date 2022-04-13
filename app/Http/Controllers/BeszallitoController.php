<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Models\Beszallito;
use Illuminate\Http\Request;
use App\Rules\elerhetoseg;
use App\Rules\irszam;

class BeszallitoController extends Controller
{
//Új beszállító

public function ujBeszallito()
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
    $telszamdup = '';
    $nevdup = '';
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
    if (preg_match("/'beszallitos_elerhetoseg_unique'/", $e->getMessage())) {
        $telszamdup = 'Van már beszállítód ezen a telefonszámon!';
    }
    if (preg_match("/'beszallitos_nev_unique'/", $e->getMessage())) {
        $nevdup = 'Van már ilyen elnevezésű beszállítód!';
    }

    $validator->errors()->add('beszallito', $message);
    $validator->errors()->add('neve', $nev);
    $validator->errors()->add('cime', $cim);
    $validator->errors()->add('telszamdup', $telszamdup);
    $validator->errors()->add('nevdup', $nevdup);
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

public function beszallitoTorles($id)
{
    $besz = Beszallito::findOrFail($id);
        if($besz->beszerzes()->count()>0){
            return redirect()->back()->with('error', "Nem törölheted a beszállítót, ha beszerzéshez van hozzárendelve!");
        }
        $besz->delete();
        return redirect('/mvezeto/beszallitok');
}

//Beszállító módosítása

public function beszallitoModosit(Request $request, $id)
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
    $telszamdup = '';
    $nevdup = '';

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

    if (preg_match("/'beszallitos_elerhetoseg_unique'/", $e->getMessage())) {
        $telszamdup = 'Van már beszállítód ezen a telefonszámon!';
    }
    if (preg_match("/'beszallitos_nev_unique'/", $e->getMessage())) {
        $nevdup = 'Van már ilyen elnevezésű beszállítód!';
    }


    $validator->errors()->add('beszallito', $message);
    $validator->errors()->add('neve', $nev);
    $validator->errors()->add('cime', $cim);
    $validator->errors()->add('telszamdup', $telszamdup);
    $validator->errors()->add('nevdup', $nevdup);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/beszallito')->withErrors($validator);
}
}

public function beszallitoSzerkesztes($id)
{
    $beszallito = Beszallito::find($id);
    return view('mvezeto/beszallitomodosit', ['beszallito' => $beszallito]);
}

}
