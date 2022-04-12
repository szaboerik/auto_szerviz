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
            <h2>Alkatrész felvitele</h2>
            <form action="/api/alkatresz" method="POST">
                @csrf
                  <label for="alk_neve">Alkatrész neve</label>
                  <input type="text" id="alk_neve" name="alk_neve" value="{{ old('alk_neve') }}"><br>
                  @error('alkatresz')
                  <div class="alert alert-danger">{{ $errors->first('alkatresz') }}</div>
                  @enderror

                  @error('alkatreszdup')
                  <div class="alert alert-danger">{{ $errors->first('alkatreszdup') }}</div>
                  @enderror
                  <button type="submit" class="btn btn-success" >Mentés</button>
                  <a href="/mvezeto/alkatreszek" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>