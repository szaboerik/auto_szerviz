<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Jelleg;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class JellegController extends Controller
{

//Új jelleg

public function ujjelleg()
{
    return view('mvezeto/jelleg');
}

public function jelleg(Request $request) {
    try{
    $jelleg = new Jelleg();
    $jelleg -> jelleg = $request -> jelleg;
    $jelleg -> elnevezes = $request -> elnevezes;
    $jelleg -> oradij = $request -> oradij;
    $jelleg->save();
    return redirect('/mvezeto/jellegek');
    //$e = new Exception('Az óradíj nem lehet 5000-nél kisebb és 20000-nél nagyobb!');
    //throw new Exception('insert into `jellegs` (`jelleg`, `elnevezes`, `oradij`, `updated_at`, `created_at`)');
    }catch(QueryException  $e){
        $oradij = '';
        $elnev = '';
        $oradijures = '';
        $validator = Validator::make([],[]);
        if (preg_match("/Az óradíj nem lehet 5000-nél kisebb és 20000-nél nagyobb!/", $e->getMessage())) {
            $oradij = 'Az óradíj nem lehet 5000-nél kisebb és 20000-nél nagyobb!';
        }
        if (preg_match("/'elnevezes' cannot be null/", $e->getMessage())) {
            $elnev = 'A mező kitöltése kötelező!';
        }
        if (preg_match("/'oradij' cannot be null/", $e->getMessage())) {
            $oradijures = 'A mező kitöltése kötelező!';
        }
        //$message = explode('>>: ', $e->getPrevious()->getMessage());
        $validator->errors()->add('oradij', $oradij);
        $validator->errors()->add('elnevezes', $elnev);
        $validator->errors()->add('jelleg', $oradijures);
     //   return redirect('/mvezeto/jellegek')->withErrors($validator);
     return redirect()->back()->withErrors($validator)->withInput($request->input());
     return redirect('/mvezeto/jelleg')->withErrors($validator);
    }
   // return redirect('/mvezeto/jellegek');
}

//Jellegek kilistázása

public function jellegek()
{
    
    $jellegek = Jelleg::all();
    return view('mvezeto.jellegek', ['jellegek' => $jellegek]);
}

//Jelleg törlése

public function jellegtorles($id)
{
    Jelleg::find($id)->delete();
    return redirect('/mvezeto/jellegek');
}

//Jelleg módosítása

public function jellegmodosit(Request $request, $id)
{ try{
    $jelleg = Jelleg::find($id);
    $jelleg -> jelleg = $request -> jelleg;
    $jelleg -> elnevezes = $request -> elnevezes;
    $jelleg -> oradij = $request -> oradij;
    $jelleg->save();

    return redirect('/mvezeto/jellegek');
} catch(QueryException  $e){
    $oradij = '';
    $elnev = '';
    $oradijures = '';
    $validator = Validator::make([],[]);
    if (preg_match("/Az óradíj nem lehet 5000-nél kisebb és 20000-nél nagyobb!/", $e->getMessage())) {
        $oradij = 'Az óradíj nem lehet 5000-nél kisebb és 20000-nél nagyobb!';
    }
    if (preg_match("/'elnevezes' cannot be null/", $e->getMessage())) {
        $elnev = 'A mező kitöltése kötelező!';
    }
    if (preg_match("/'oradij' cannot be null/", $e->getMessage())) {
        $oradijures = 'A mező kitöltése kötelező!';
    }
    //$message = explode('>>: ', $e->getPrevious()->getMessage());
    $validator->errors()->add('oradij', $oradij);
    $validator->errors()->add('elnevezes', $elnev);
    $validator->errors()->add('jelleg', $oradijures);
 //   return redirect('/mvezeto/jellegek')->withErrors($validator);
 return redirect()->back()->withErrors($validator)->withInput($request->input());
 return redirect('/mvezeto/jelleg')->withErrors($validator);
}
// return redirect('/mvezeto/jellegek');
}

public function jellegszerkesztes($id)
{
    $jelleg = Jelleg::find($id);
    return view('mvezeto/jellegmodosit', ['jelleg' => $jelleg]);
    }
}
