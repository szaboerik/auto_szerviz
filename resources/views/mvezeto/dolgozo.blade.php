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
            <h2>Dolgozó felvitele</h2>
            <form action="/api/dolgozo" method="POST">
                @csrf
                  <label for="d_kod">Dolgozó azonosító</label>
                  <input type="number" id="d_kod" name="d_kod" readonly><br>
                  <label for="dolg_nev">Dolgozó neve</label>
                  <input type="text" id="dolg_nev" name="dolg_nev"><br>
                    <label for="kepesseg">Képesség</label>
                    <select name="kepesseg">
                        
                  <option value="s">szerelő</option>
                  <option value="v">vezető</option>
                    </select>
                  <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
                  <a href="{{url()->previous()}}" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>