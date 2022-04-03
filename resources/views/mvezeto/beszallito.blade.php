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
            <h2>Beszállító felvitele</h2>
            <form action="/api/beszallito" method="POST">
                @csrf
                  <label for="beszall_kod">Beszállító kód</label>
                  <input type="number" id="beszall_kod" name="beszall_kod" readonly><br>
                  <label for="nev">Neve</label>
                  <input type="text" id="nev" name="nev"><br>
                  <label for="irsz">Irányítószám</label>
                  <input type="number" id="irsz" name="irsz" value="{{ old('irsz') }}" placeholder = "1234"><br>
                  @error('irsz')
                        <div class="alert alert-danger">{{ $errors->first('irsz') }}</div>
                    @enderror
                  <label for="cim">Lakcím</label>
                  <input type="text" id="cim" name="cim"><br>
                  <label for="elerhetoseg">Elérhetősége</label>
                  <input type="text" id="elerhetoseg" name="elerhetoseg" value="{{ old('elerhetoseg') }}" placeholder="+36701234567"><br>
                  @error('elerhetoseg')
                        <div class="alert alert-danger">{{ $errors->first('elerhetoseg') }}</div>
                    @enderror
                  <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
                  <a href="{{url()->previous()}}" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>