@include('layouts.belepve')

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
                  <label for="nev">Neve</label>
                  <input type="text" id="nev" name="nev" value="{{ old('nev') }}"><br>
                  @error('neve')
                        <div class="alert alert-danger">{{ $errors->first('neve') }}</div>
                    @enderror
                    @error('nevdup')
                        <div class="alert alert-danger">{{ $errors->first('nevdup') }}</div>
                    @enderror
                  <label for="irsz">Irányítószám</label>
                  <input type="number" id="irsz" name="irsz" value="{{ old('irsz') }}" placeholder = "1234"><br>
                  @error('irsz')
                        <div class="alert alert-danger">{{ $errors->first('irsz') }}</div>
                    @enderror
                  <label for="cim">Címe</label>
                  <input type="text" id="cim" name="cim" value="{{ old('cim') }}"><br>
                  @error('cime')
                        <div class="alert alert-danger">{{ $errors->first('cime') }}</div>
                    @enderror
                  <label for="elerhetoseg">Elérhetősége</label>
                  <input type="text" id="elerhetoseg" name="elerhetoseg" value="{{ old('elerhetoseg') }}" placeholder="+36701234567"><br>
                  @error('elerhetoseg')
                        <div class="alert alert-danger">{{ $errors->first('elerhetoseg') }}</div>
                    @enderror
                    @error('telszamdup')
                        <div class="alert alert-danger">{{ $errors->first('telszamdup') }}</div>
                    @enderror
                  <button type="submit" class="btn btn-success">Mentés</button>
                  <a href="/mvezeto/beszallitok" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</body>
</html>