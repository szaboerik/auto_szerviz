<?php

namespace App\Http\Controllers;

use App\Models\Szerviz;
use Illuminate\Http\Request;

class SzervizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function munkalapok() {
        $szervizek = Szerviz::all();
        return view('mvezeto.munkak', ['szervizek' => $szervizek]);
    }


    public function ujmunkalap(Request $request) {
        $szerviz = new Szerviz();
        $szerviz->beszerzes_azonosito = $request->beszerzes_azonosito;
        $szerviz->ugyfel_nev = $request->ugyfel_nev;
        $szerviz->ugyfel_telefonszam = $request->ugyfel_telefonszam;
        $szerviz->rendszam = $request->rendszam;
        $szerviz->auto_erkezese = $request->auto_erkezese;
        $szerviz->munka_kezdete = $request->munka_kezdete;
        $szerviz->munka_vege = $request->munka_vege;
        $szerviz->auto_tavozasa = $request->auto_tavozasa;
        $szerviz->fizetendo_osszeg = $request->fizetendo_osszeg;
        $szerviz->save();

        return redirect('mvezeto/munkak');
    }

    public function rendeles(Request $request) {
        $szerviz = new Szerviz();
        $szerviz->beszerzes_azonosito = $request->beszerzes_azonosito;
        $szerviz->feladatszam = $request->feladatszam;
        $szerviz->alkatresz = $request->alkatresz;
        $szerviz->beszallito_kod = $request->beszallito_kod;
        $szerviz->egysegar = $request->egysegar;
        $szerviz->mennyiseg = $request->mennyiseg;
        $szerviz->megrendelve = $request->megrendelve;
        $szerviz->atveve = $request->atveve;
        $szerviz->save();
    }


    public function index()
    {
        return Szerviz::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Szerviz  $szerviz
     * @return \Illuminate\Http\Response
     */
    public function show(Szerviz $szerviz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Szerviz  $szerviz
     * @return \Illuminate\Http\Response
     */
    public function edit(Szerviz $szerviz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Szerviz  $szerviz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Szerviz $szerviz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Szerviz  $szerviz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Szerviz $szerviz)
    {
        //
    }
}
