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
    <form action="/api/feladat/{{ $feladat->f_szam }}" method="POST">
      @csrf
      @method('put')
        <label for="f_szam">Feladatszám</label>
        <input type="number" id="f_szam" name="f_szam" value="{{ $feladat->f_szam }}" readonly><br>
        <label for="m_szam">Munkaszám</label>
                <select name="m_szam">
                @foreach ($munkalaps as $munkalap)
                <option value="{{ $munkalap->m_szam }}" {{$munkalap->m_szam == $feladat->m_szam ? 'selected' : ''}}>{{ $munkalap->m_szam }}</option>
                @endforeach
                </select><br>
                <label for="jelleg">Jelleg</label>
                <select name="jelleg">
                @foreach ($jellegs as $jelleg)
                <option value="{{ $jelleg->jelleg }}" {{$jelleg->jelleg == $feladat->jelleg ? 'selected' : ''}}>{{ $jelleg->elnevezes }}</option>
                @endforeach
                </select><br>
                <label for="d_kod">Szerelő</label>
                <select name="d_kod">
                @foreach ($dolgozos as $dolgozo)
                <option value="{{ $dolgozo->d_kod }}" {{$dolgozo->d_kod == $feladat->szerelo ? 'selected' : ''}}>{{ $dolgozo->dolg_nev }}</option>
                @endforeach
                </select><br>
                <label for="munkaora">Munkaóra</label>
                <input type="number" id="munkaora" name="munkaora" value="{{ $feladat->munkaora }}"><br>
                <label for="f_osszege">Feladat összege</label>
                  <input type="number" id="f_osszege" name="f_osszege" value="{{ $feladat->f_osszege }}"readonly><br>
                  <label for="besz_osszege">Beszerzés összege</label>
                  <input type="number" id="besz_osszege" name="besz_osszege" value="{{ $feladat->besz_osszege }}"readonly><br>
      <button type="submit" class="btn btn-success">Mentés</button>
      <a href="{{url()->previous()}}" class="button">Mégse</a>
    </form>
  </div>
</article>
</main>
</body>
</html>