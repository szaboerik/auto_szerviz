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
    <form action="/api/beszerzes/{{ $beszerzes->besz_azon }}" method="POST">
      @csrf
      @method('put')
        <label for="besz_azon">Beszerzés azonosító</label>
        <input type="number" id="besz_azon" name="besz_azon" value="{{ $beszerzes->besz_azon }}" readonly><br>
        <label for="f_szam">Feladatszám</label>
                <select name="f_szam">
                
                @foreach ($feladats as $feladat)
                <option value="{{ $feladat->f_szam }}"{{$feladat->f_szam == $beszerzes->f_szam ? 'selected' : 'disabled'}}>{{ $feladat->f_szam }} </option>
                @endforeach
                </select><br>
                <label for="alk_azon">Alkatrész</label>
                <select name="alk_azon">
                @foreach ($alkatreszs as $alkatresz)
                <option value="{{ $alkatresz->alk_azon }}">{{ $alkatresz->alk_neve }}</option>
                @endforeach
                </select><br>
                <label for="beszall_kod">Beszállító kód</label>
                <select name="beszall_kod">
                @foreach ($beszallitos as $beszallito)
                <option value="{{ $beszallito->beszall_kod }}">{{ $beszallito->nev }}</option>
                @endforeach
                </select><br>
        <label for="egyseg_ar">Egységár</label>
        <input type="number" id="egyseg_ar" name="egyseg_ar" value="{{ $beszerzes->egyseg_ar }}"><br>
        <label for="mennyiseg">Mennyiség</label>
        <input type="number" id="mennyiseg" name="mennyiseg" value="{{ $beszerzes->mennyiseg }}"><br>
        <label for="besz_osszege">Beszerzés összege</label>
        <input type="number" id="besz_osszege" name="besz_osszege" value="{{ $beszerzes->besz_osszege }}" readonly><br>
      <button type="submit" class="btn btn-success">Mentés</button>
      <a href="{{url()->previous()}}" class="button">Mégse</a>
    </form>
  </div>
</article>
</main>
</body>
</html>