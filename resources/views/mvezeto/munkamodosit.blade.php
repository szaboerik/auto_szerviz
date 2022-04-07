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
    <h2>Munkalap módosítása</h2>
    <form action="/api/munkalap/{{ $munkalap->m_szam }}" method="POST">
      @csrf
      @method('put')
        <label for="m_szam">Munkaszám</label>
        <input type="number" id="m_szam" name="m_szam" value="{{ $munkalap->m_szam }}" readonly><br>
        <label for="ugyfel_neve">Ügyfél neve</label>
        <input type="text" id="ugyfel_neve" name="ugyfel_neve" value="{{ $munkalap->ugyfel_neve }}"><br>
        @error('ugyfelnev')
                        <div class="alert alert-danger">{{ $errors->first('ugyfelnev') }}</div>
                    @enderror
        <label for="ugyfel_telszama">Ügyfél telefonszáma</label>
        <input type="text" id="ugyfel_telszama" name="ugyfel_telszama" value="{{ $munkalap->ugyfel_telszama }}" placeholder="+36701234567"><br>
        @error('ugyfel_telszama')
                        <div class="alert alert-danger">{{ $errors->first('ugyfel_telszama') }}</div>
                    @enderror
        <label for="rendszam">Rendszám</label>
                <select name="rendszam" placeholder="ABC123">
                @foreach ($autos as $auto)
                <option value="{{ $auto->id }}" {{$auto->id == $munkalap->auto->id ? 'selected' : ''}}>{{ $auto->rendszam }} </option>
                @endforeach
                </select><br>
                @error('rsz')
                        <div class="alert alert-danger">{{ $errors->first('rsz') }}</div>
                    @enderror
        <label for="munka_kezdete">Munka kezdete</label>
        <input type="date" id="munka_kezdete" name="munka_kezdete" value="{{ $munkalap->munka_kezdete }}" readonly><br>
        <label for="munka_vege">Munka vége</label>
        <input type="date" id="munka_vege" name="munka_vege" value="{{ $munkalap->munka_vege }}"><br>
        @error('vege')
                        <div class="alert alert-danger">{{ $errors->first('vege') }}</div>
                    @enderror
        <label for="fizetendo">Fizetendő</label>
        <input type="number" id="fizetendo" name="fizetendo" value="{{ $munkalap->fizetendo }}" readonly><br>
        <button type="submit" class="btn btn-success">Mentés</button>
      <a href="/mvezeto/munkak" class="button">Mégse</a>
    </form>
</div>
</article>
</main>
</body>
</html>