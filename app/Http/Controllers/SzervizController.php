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
    public function index() {
        return Szerviz::all();
    }

}
