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
            <h2>Munkalap felvitele</h2>
            <form action="/api/munkalap" method="POST">
                @csrf
                
                <label for="ugyfel_neve">Ügyfél neve</label>
                <input type="text" id="ugyfel_neve" name="ugyfel_neve" value="{{ old('ugyfel_neve') }}"><br>
                @error('ugyfelnev')
                        <div class="alert alert-danger">{{ $errors->first('ugyfelnev') }}</div>
                    @enderror
                <label for="ugyfel_telszama">Ügyfél telefonszáma</label>
                <input type="text" id="ugyfel_telszama" name="ugyfel_telszama" value="{{ old('ugyfel_telszama') }}" placeholder="+36701234567"><br>
                @error('ugyfel_telszama')
                        <div class="alert alert-danger">{{ $errors->first('ugyfel_telszama') }}</div>
                    @enderror
                <label for="rendszam">Rendszám</label>
                <select name="rendszam" autocomplete="off">
                @foreach ($autos as $auto)
                <option value="{{ $auto->id }}" {{$auto->rendszam==request()->get('rendszam') ? "selected" : "" }} > {{$auto->rendszam}}</option>
                                    
                @endforeach
                </select><br>
                @error('rsz')
                        <div class="alert alert-danger">{{ $errors->first('rsz') }}</div>
                    @enderror
                <button type="submit" class="btn btn-success">Mentés</button>
                <a href="/mvezeto/munkak" class="button">Mégse</a>
              </form> 
        </article>
    </main>
</div>
</form>
</body>
</html>