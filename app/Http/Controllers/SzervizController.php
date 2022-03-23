<?php

namespace App\Http\Controllers;

use App\Models\Szerviz;
use App\Models\Feladat;
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
                return redirect("dolgozo");
                exit();
            }if($beFhn == $mvezetoFhn && $beJsz == $mvezetoJsz){
                $_SESSION["belepve"] = true;
                $_SESSION["nev"] =$beFhn;
                return redirect("mvezeto/autok");
                exit();
            }
            else{
                $_SESSION["belepve"] = false;
                return redirect("belepes");
            }
        }
    }
/*
    public function Validator() {
        /*
        $nameErr = "";
if (!empty($_SERVER["QUERY_STRING"])) {
    if (empty($_POST["alk_neve"])) {
      $nameErr = "Name is required";
    }
    else {
        return redirect("alkatreszek");
    }
}


        session_start();

        $alk_neve="";
    
        if(!empty($_SERVER["QUERY_STRING"])){
            if(isset($_GET["alk_neve"])){
                $alk_neve = $_GET["alk_neve"];
            }
        }
        if(isset($_POST["mehet"])){
            $bealkneve = $_POST["alk_neve"];  
            if(empty($_POST["alk_neve"])){
                $_SESSION["Validator"] = false;
                echo "<h1>Nem jó!</h1>";
                return redirect('alkatresz');
            }
            
        }

    }
*/
    public function index() {
        return Szerviz::all();
    }

}
