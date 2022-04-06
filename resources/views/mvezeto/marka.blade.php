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
            <h2>Márka felvitele</h2>
            <form action="/api/marka" method="POST">
                @csrf
                  <label for="marka">Márka</label>
                  <input type="text" id="marka" name="marka"><br>
                  <button type="submit" class="btn btn-success">Mentés</button>
                  <a href="{{url()->previous()}}" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>