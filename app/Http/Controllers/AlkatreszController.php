<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Alkatresz;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AlkatreszController extends Controller
{
//Új Alkatrész
public function ujalkatresz()
{
    return view('mvezeto/alkatresz');
} 
public function alkatresz(Request $request) {
    try{
    $alkatresz = new Alkatresz();
    $alkatresz -> alk_azon = $request -> alk_azon;
    $alkatresz -> alk_neve = $request -> alk_neve;
    $alkatresz->save();
    return redirect('/mvezeto/alkatreszek');
}catch(QueryException  $e){
    $message = '';
    $alkdup = '';
    $validator = Validator::make([],[]);
    if (preg_match("/'alk_neve' cannot be null/", $e->getMessage())) {
        $message = 'A mező kitöltése kötelező!';
    }
    
    if (preg_match("/alkatreszs_alk_neve_unique'/", $e->getMessage())) {
        $alkdup = 'Van már ilyen elnevezésű alkatrészed!';
    }
    $validator->errors()->add('alkatresz', $message);
    $validator->errors()->add('alkatreszdup', $alkdup);
 
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/alkatresz')->withErrors($validator);
}
}
//Alkatrészek kilistázása
public function alkatreszek()
{
    $alkatreszs = Alkatresz::all();
    return view('mvezeto.alkatreszek', ['alkatreszs' => $alkatreszs]);
}
//Alkatrész törlése
public function alkatresztorles($id)
{
    
        $alk = Alkatresz::findOrFail($id);
        if($alk->beszerzes()->count()>0){
            return redirect()->back()->with('error', "Nem törölheted az alkatrészt, ha beszerzéshez van hozzárendelve!");
        }
        $alk->delete();
        return redirect('/mvezeto/alkatreszek');
    } 

//Alkatrész módosítása
public function alkatreszmodosit(Request $request, $id)
{
    try{
    $alkatresz = Alkatresz::find($id);
    $alkatresz -> alk_azon = $request -> alk_azon;
    $alkatresz -> alk_neve = $request -> alk_neve;
    $alkatresz->save();

    return redirect('/mvezeto/alkatreszek');
} catch (QueryException  $e){
    $message = '';
    $alkdup = '';
    $validator = Validator::make([],[]);
    if (preg_match("/'alk_neve' cannot be null/", $e->getMessage())) {
        $message = 'A mező kitöltése kötelező!';
    }
    
    if (preg_match("/alkatreszs_alk_neve_unique'/", $e->getMessage())) {
        $alkdup = 'Van már ilyen elnevezésű alkatrészed!';
    }

    $validator->errors()->add('alkatresz', $message);
    $validator->errors()->add('alkatreszdup', $alkdup);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/alkatresz')->withErrors($validator);
}
}

public function alkatreszszerkesztes($id)
{
    $alkatresz = Alkatresz::find($id);
    return view('mvezeto/alkatreszmodosit', ['alkatresz' => $alkatresz]);
}

}
