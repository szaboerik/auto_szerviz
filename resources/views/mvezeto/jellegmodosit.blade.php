<?php
function check(){
    if(isset($_SESSION["belepve"])){ return true;}
    else {return false;}
}
session_start();
if(!check()){
    header("Location:../belepes");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Adatfelvitel</title>
</head>
<body>
    <main>
    <div class="grid-container">
    @include('layouts.oldalmenu')
        <article class="item3">
            <div style="width: 80%; margin: auto;">
            <form action="/api/jelleg/{{ $jelleg->jelleg }}" method="POST">
                @csrf
                @method('put')
                  <label for="jelleg">Jelleg</label>
                  <input type="text" id="jelleg" name="jelleg" value="{{ $jelleg->jelleg }}" readonly><br>
                  <label for="elnevezes">Elnevezés</label>
                  <input type="text" id="elnevezes" name="elnevezes" value="{{ $jelleg->elnevezes }}"><br>
                  <label for="oradij">Óradíj</label>
                  <input type="number" id="oradij" name="oradij" value="{{ $jelleg->oradij }}"><br>
                  <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
                  <a href="{{url()->previous()}}" class="button">Mégse</a>
              </form> 
              </div>
        </article>
    </main>
</body>
</html>