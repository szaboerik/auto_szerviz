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
<body>
<main class="grid-container">
        <header class="header">
        Beszállító módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
  <div style="width: 80%; margin: auto;">
    <form action="/api/beszallito/{{ $beszallito->beszall_kod }}" method="POST">
      @csrf
      @method('put')
        <label for="beszall_kod">Beszállító kód</label>
        <input type="number" id="beszall_kod" name="beszall_kod" value="{{ $beszallito->beszall_kod }}" readonly><br>
        <label for="nev">Neve</label>
        <input type="text" id="nev" name="nev" value="{{ $beszallito->nev }}"><br>
        <label for="irsz">Irányítószám</label>
        <input type="text" id="irsz" name="irsz" value="{{ $beszallito->irsz }}" placeholder = "1234"><br>
        @error('irsz')
                        <div class="alert alert-danger">{{ $errors->first('irsz') }}</div>
                    @enderror
        <label for="cim">Lakcím</label>
        <input type="text" id="cim" name="cim" value="{{ $beszallito->cim }}"><br>
        <label for="elerhetoseg">Elérhetősége</label>
        <input type="text" id="elerhetoseg" name="elerhetoseg" value="{{ $beszallito->elerhetoseg }}" placeholder="+36701234567"><br>
        @error('elerhetoseg')
                        <div class="alert alert-danger">{{ $errors->first('elerhetoseg') }}</div>
                    @enderror
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
      <a href="{{url()->previous()}}" class="button">Mégse</a>
    </form>
  </div>
</article>
</main>
</body>
</html>