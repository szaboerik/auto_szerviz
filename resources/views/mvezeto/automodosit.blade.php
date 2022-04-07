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
    <h2>Autó módosítása</h2>
    <form action="/api/auto/{{ $auto->id }}" method="POST">
      @csrf
      @method('put')
        <label for="rendszam">Rendszám</label>
        <input type="text" id="rendszam" name="rendszam" value="{{ $auto->rendszam }}" placeholder="ABC123"><br>
        @error('rendszam')
                        <div class="alert alert-danger">{{ $errors->first('rendszam') }}</div>
                    @enderror
                    @error('rszdup')
                        <div class="alert alert-danger">{{ $errors->first('rszdup') }}</div>
                    @enderror
        <label for="markaId">Márka</label>
                <select name="markaId">
                @foreach ($markas as $marka)
                <option value="{{ $marka->id }}" {{$marka->id == $auto->markaId ? 'selected' : ''}}>{{ $marka->marka }}</option>
                @endforeach
                </select><br>
        <label for="forgalmi">Forgalmi</label>
        <input type="text" id="forgalmi" name="forgalmi" value="{{ $auto->forgalmi }}" placeholder="abc12345"><br>
        @error('forgalmi')
                        <div class="alert alert-danger">{{ $errors->first('forgalmi') }}</div>
                    @enderror
                    @error('forgdup')
                        <div class="alert alert-danger">{{ $errors->first('forgdup') }}</div>
                    @enderror
        <label for="evjarat">Évjárat</label>
        <input type="number" id="evjarat" name="evjarat" value="{{ $auto->evjarat }}"><br>
        @error('evjarat')
                  <div class="alert alert-danger">{{ $errors->first('evjarat') }}</div>
                  @enderror
                  @error('evjaratcheck')
                  <div class="alert alert-danger">{{ $errors->first('evjaratcheck') }}</div>
                  @enderror
      <button type="submit" class="btn btn-success" >Mentés</button>
      <a href="/mvezeto/autok" class="button">Mégse</a>
    </form>
  </div>
</article>
</main>
</body>
</html>