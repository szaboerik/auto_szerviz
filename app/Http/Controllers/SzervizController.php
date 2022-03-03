<?php

namespace App\Http\Controllers;

use App\Models\Szerviz;
use Illuminate\Http\Request;

class SzervizController extends Controller
{
    public function belepes() {
        session_start();

        $fhn="";
    
        if(!empty($_SERVER["QUERY_STRING"])){
            if(isset($_GET["fhn"])){
                $fhn = $_GET["fhn"];
            }
        }
        
        $dolgozoFhn = "a";
        $dolgozoJsz = "a";
    
        $mvezetoFhn = "admin";
        $mvezetoJsz = "admin";
    
    
        if(isset($_POST["mehet"])){
            $beFhn = $_POST["fhn"]; 
            $beJsz = $_POST["jsz"]; 
            if($beFhn == $dolgozoFhn && $beJsz == $dolgozoJsz){
                $_SESSION["belepve"] = true;
                $_SESSION["nev"] =$beFhn;
                return redirect("dfeladatok");
                exit();
            }if($beFhn == $mvezetoFhn && $beJsz == $mvezetoJsz){
                $_SESSION["belepve"] = true;
                $_SESSION["nev"] =$beFhn;
                return redirect("munkalap");
                exit();
            }
            else{
                $_SESSION["belepve"] = false;
                return redirect("belepes");
            }
        }
    }
    public function index() {
        return Szerviz::all();
    }



//Feladathoz tartozók
//---------------------------------------------------------
//Új feladat
    public function feladat(Request $request) {
        $szerviz = new Szerviz();
        //Ez kell!
        //$szerviz -> f_szam = $request -> f_szam;
        //$szerviz -> m_szam = $request -> m_szam;
        //$szerviz -> jelleg = $request -> jelleg;
        //$szerviz -> szerelo = $request -> szerelo;
        //$szerviz -> munkaora = $request -> munkaora;
        //$szerviz -> besz_osszege = $request -> besz_osszege;
        //Ez kell!
        $szerviz->save();

        return redirect('/mvezeto/feladatok');
    }
//Feladatok kilistázása
    public function feladatok()
    {
        //Itt majd a szervizs kell átírni a táblázat nevére, egyenlőre így működik
        $szervizs = Szerviz::all();
        return view('mvezeto.feladatok', ['szervizs' => $szervizs]);
    }
//Feladat törlése
    public function ftorles($id)
    {
        Szerviz::find($id)->delete();
        return redirect('/mvezeto/feladatok');
    }

//Feladat módosítása
    public function fmodosit(Request $request, $id)
    {
        $szerviz = Szerviz::find($id);
        //$szerviz -> f_szam = $request -> f_szam;
        //$szerviz -> m_szam = $request -> m_szam;
        //$szerviz -> jelleg = $request -> jelleg;
        //$szerviz -> szerelo = $request -> szerelo;
        //$szerviz -> munkaora = $request -> munkaora;
        //$szerviz -> besz_osszege = $request -> besz_osszege;
        $szerviz->save();

        return redirect('/mvezeto/feladatok');
    }
    public function fszerkesztes($id)
    {
        $szerviz = Szerviz::find($id);
        return view('mvezeto/feladatmodosit', ['szerviz' => $szerviz]);
    }
//Feladat mutatása ID szerint
    //public function fmutat($id)
    //{
    //    return Szerviz::find($id);
    //}

//Munkalaphoz tartozó dolgok
//-----------------------------------

//Új munkalap
public function munkalap(Request $request) {
    $szerviz = new Szerviz();
    //Ez kell!
    //$szerviz -> m_szam = $request -> m_szam;
    //$szerviz -> ugyfel_neve = $request -> ugyfel_neve;
    //$szerviz -> ugyfel_telszama = $request -> ugyfel_telszama;
    //$szerviz -> rendszam = $request -> rendszam;
    //$szerviz -> munka_kezdete = $request -> munka_kezdete;
    //$szerviz -> munka_vege = $request -> munka_vege;
    //$szerviz -> fizetendo = $request -> fizetendo;
    //Ez kell!
    $szerviz->save();

    return redirect('/mvezeto/munkak');
}

//Munkalapok kilistázása
public function munkak()
{
    //Itt majd a szervizs kell átírni a táblázat nevére, egyenlőre így működik
    $szervizs = Szerviz::all();
    return view('mvezeto.munkak', ['szervizs' => $szervizs]);
}

//Munkalap törlése
public function mtorles($id)
{
    Szerviz::find($id)->delete();
    return redirect('/mvezeto/munkak');
}

//Munkalap módosítása
public function mmodosit(Request $request, $id)
{
    $szerviz = Szerviz::find($id);
    //$szerviz -> m_szam = $request -> m_szam;
    //$szerviz -> ugyfel_neve = $request -> ugyfel_neve;
    //$szerviz -> ugyfel_telszama = $request -> ugyfel_telszama;
    //$szerviz -> rendszam = $request -> rendszam;
    //$szerviz -> munka_kezdete = $request -> munka_kezdete;
    //$szerviz -> munka_vege = $request -> munka_vege;
    //$szerviz -> fizetendo = $request -> fizetendo;
    $szerviz->save();

    return redirect('/mvezeto/munkak');
}
public function mszerkesztes($id)
{
    $szerviz = Szerviz::find($id);
    return view('mvezeto/munkamodosit', ['szerviz' => $szerviz]);
}

//Feladat mutatása ID szerint
    //public function mmutat($id)
    //{
    //    return Szerviz::find($id);
    //}

//Rendeléshez tartozó dolgok
//-------------------------------

//Új rendelés
public function rendeles(Request $request) {
    $szerviz = new Szerviz();
    //Ez kell!
    //$szerviz -> besz_azon = $request -> besz_azon;
    //$szerviz -> f_szam = $request -> f_szam;
    //$szerviz -> alkatresz = $request -> alkatresz;
    //$szerviz -> beszall_kod = $request -> beszall_kod;
    //$szerviz -> egyseg_ar = $request -> egyseg_ar;
    //$szerviz -> mennyiseg = $request -> mennyiseg;
    //$szerviz -> besz_osszege = $request -> besz_osszege;
    //$szerviz -> atveve = $request -> atveve;
    //Ez kell!
    $szerviz->save();

    return redirect('/mvezeto/rendelesek');
}

//Rendelések kilistázása
public function rendelesek()
{
    //Itt majd a szervizs kell átírni a táblázat nevére, egyenlőre így működik
    $szervizs = Szerviz::all();
    return view('mvezeto.rendelesek', ['szervizs' => $szervizs]);
}

//Rendelés törlése
public function rtorles($id)
{
    Szerviz::find($id)->delete();
    return redirect('/mvezeto/rendelesek');
}

//Rendelés módosítása
public function rmodosit(Request $request, $id)
{
    $szerviz = Szerviz::find($id);
    //$szerviz -> besz_azon = $request -> besz_azon;
    //$szerviz -> f_szam = $request -> f_szam;
    //$szerviz -> alkatresz = $request -> alkatresz;
    //$szerviz -> beszall_kod = $request -> beszall_kod;
    //$szerviz -> egyseg_ar = $request -> egyseg_ar;
    //$szerviz -> mennyiseg = $request -> mennyiseg;
    //$szerviz -> besz_osszege = $request -> besz_osszege;
    //$szerviz -> atveve = $request -> atveve;
    $szerviz->save();

    return redirect('/mvezeto/rendelesek');
}
public function rszerkesztes($id)
{
    $szerviz = Szerviz::find($id);
    return view('mvezeto/rendelesmodosit', ['szerviz' => $szerviz]);
}

//Rendelés mutatása ID szerint
    //public function rmutat($id)
    //{
    //    return Szerviz::find($id);
    //}


}
