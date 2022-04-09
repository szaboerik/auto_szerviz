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
            <h2>Feladat felvitele</h2>
            <form action="/api/feladat" method="POST">
                @csrf
                  <label for="f_szam">Feladatszám</label>
                  <input type="number" id="f_szam" name="f_szam" readonly><br>
                  <label for="m_szam">Munkaszám</label>
                <select name="m_szam">
                @foreach ($munkalaps as $munkalap)
                <option value="{{ $munkalap->m_szam }}">{{ $munkalap->m_szam }}</option>
                @endforeach
                </select><br>
                @error('befejezettmunkalap')
                  <div class="alert alert-danger">{{ $errors->first('befejezettmunkalap') }}</div> 
                  @enderror
                <label for="jelleg">Jelleg</label> 
                <select name="jelleg">
                @foreach ($jellegs as $jelleg)
                <option value="{{ $jelleg->jelleg }}">{{ $jelleg->elnevezes }}</option>
                @endforeach
                </select><br>
                @error('jelleg')
                  <div class="alert alert-danger">{{ $errors->first('jelleg') }}</div>
                  @enderror
                <label for="d_kod">Dolgozó</label>
                <select name="d_kod">
                @foreach ($dolgozos as $dolgozo)
                <option value="{{ $dolgozo->d_kod }}">{{ $dolgozo->dolg_nev }}</option>
                @endforeach
                </select><br>
                @error('szerelo')
                  <div class="alert alert-danger">{{ $errors->first('szerelo') }}</div>
                  @enderror
                  <label for="munkaora">Munkaóra</label>
                  <input type="number" id="munkaora" name="munkaora" value="{{ old('munkaora') }}"><br>
                  @error('munkaoranotnull')
                  <div class="alert alert-danger">{{ $errors->first('munkaoranotnull') }}</div>
                  @enderror
                  @error('szerelomaxmunkora')
                  <div class="alert alert-danger">{{ $errors->first('szerelomaxmunkora') }}</div>
                  @enderror
                  @error('szerelominmunkaora')
                  <div class="alert alert-danger">{{ $errors->first('szerelominmunkaora') }}</div>
                  @enderror
                  @error('feladatmaxoraszam')
                  <div class="alert alert-danger">{{ $errors->first('feladatmaxoraszam') }}</div>
                  @enderror
                  <label for="f_osszege">Feladat összege</label>
                  <input type="number" id="f_osszege" name="f_osszege" readonly><br>
                  <label for="besz_osszege">Beszerzés összege</label>
                  <input type="number" id="besz_osszege" name="besz_osszege" readonly><br>
                  <button type="submit" class="btn btn-success">Mentés</button>
                  <a href="/mvezeto/feladatok" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>