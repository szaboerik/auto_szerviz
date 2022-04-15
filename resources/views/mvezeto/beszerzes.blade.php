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

        <article class="item3">
            <h2>Beszerzés felvétele</h2>
            <form action="/api/beszerzes" method="POST">
                @csrf
                <label for="f_szam">Feladatszám</label>
                <select name="f_szam">
                @foreach ($feladats as $feladat)
                <option {{old('f_szam', $feladat->f_szam) == $feladat->f_szam ? 'selected' : '' }} 
                value="{{$feladat->f_szam}}">{{ $feladat->f_szam}}</option>
                @endforeach
                </select><br>
                @error('fszam')
                        <div class="alert alert-danger">{{ $errors->first('fszam') }}</div>
                    @enderror
                    @error('fel')
                        <div class="alert alert-danger">{{ $errors->first('fel') }}</div>
                    @enderror
                <label for="alk_azon">Alkatrész</label>
                <select name="alk_azon">
                @foreach ($alkatreszs as $alkatresz)
                <option {{old('alk_azon', $alkatresz->alk_azon) == $alkatresz->alk_azon ? 'selected' : '' }} 
                value="{{$alkatresz->alk_azon}}">{{ $alkatresz->alk_neve}}</option>
                @endforeach
                </select><br>
                @error('alk')
                        <div class="alert alert-danger">{{ $errors->first('alk') }}</div>
                    @enderror
                <label for="beszall_kod">Beszállító kód</label>
                <select name="beszall_kod">
                @foreach ($beszallitos as $beszallito)
                <option {{old('beszall_kod', $beszallito->beszall_kod) == $beszallito->beszall_kod ? 'selected' : '' }} 
                value="{{$beszallito->beszall_kod}}">{{$beszallito->nev}}</option>
                @endforeach
                </select><br>
                @error('besz')
                        <div class="alert alert-danger">{{ $errors->first('besz') }}</div>
                    @enderror
                <label for="egyseg_ar">Egységár</label>
                <input type="number" id="egyseg_ar" name="egyseg_ar" value="{{ old('egyseg_ar') }}"><br>
                @error('egysegar')
                        <div class="alert alert-danger">{{ $errors->first('egysegar') }}</div>
                    @enderror
                    @error('egysegarv')
                        <div class="alert alert-danger">{{ $errors->first('egysegarv') }}</div>
                    @enderror
                <label for="mennyiseg">Mennyiség</label>
                <input type="number" id="mennyiseg" name="mennyiseg" value="{{ old('mennyiseg') }}"><br>
                @error('mennyiseg')
                        <div class="alert alert-danger">{{ $errors->first('mennyiseg') }}</div>
                    @enderror
                    @error('mennyisegv')
                        <div class="alert alert-danger">{{ $errors->first('mennyisegv') }}</div>
                    @enderror
                <label for="besz_osszege">Beszerzés összege</label>
                <input type="number" id="besz_osszege" name="besz_osszege" readonly><br>
                
                <button type="submit" class="btn btn-success">Mentés</button>
                <a href="/mvezeto/beszerzesek" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>