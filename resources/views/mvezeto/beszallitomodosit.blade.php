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
    <title>Adatszerkesztés</title>
</head>
<body>
    <main>
    
    <h2>Beszállító módosítása</h2>
    <form action="/api/beszallito/{{ $beszallito->beszall_kod }}" method="POST">
      @csrf
      @method('put')
        <label for="beszall_kod">Beszállító kód</label>
        <input type="number" id="beszall_kod" name="beszall_kod" value="{{ $beszallito->beszall_kod }}" readonly><br>
        <label for="nev">Neve</label>
        <input type="text" id="nev" name="nev" value="{{ $beszallito->nev }}"><br>
        @error('neve')
                        <div class="alert alert-danger">{{ $errors->first('neve') }}</div>
                    @enderror
        <label for="irsz">Irányítószám</label>
        <input type="text" id="irsz" name="irsz" value="{{ $beszallito->irsz }}" placeholder = "1234"><br>
        @error('irsz')
                        <div class="alert alert-danger">{{ $errors->first('irsz') }}</div>
                    @enderror
        <label for="cim">Címe</label>
        <input type="text" id="cim" name="cim" value="{{ $beszallito->cim }}"><br>
        @error('cime')
                        <div class="alert alert-danger">{{ $errors->first('cime') }}</div>
                    @enderror
        <label for="elerhetoseg">Elérhetősége</label>
        <input type="text" id="elerhetoseg" name="elerhetoseg" value="{{ $beszallito->elerhetoseg }}" placeholder="+36701234567"><br>
        @error('elerhetoseg')
                        <div class="alert alert-danger">{{ $errors->first('elerhetoseg') }}</div>
                    @enderror
      <button type="submit" class="btn btn-success">Mentés</button>
      <a href="/mvezeto/beszallitok" class="button">Mégse</a>
    </form>
  </div>
</article>
</main>
</body>
</html>