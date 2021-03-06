@include('layouts.belepve')
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
    <h2>Beszerzés módosítása</h2>
    <form action="/api/beszerzes/{{ $beszerzes->besz_azon }}" method="POST">
      @csrf
      @method('put')
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
        @error('egysegar')
                        <div class="alert alert-danger">{{ $errors->first('egysegar') }}</div>
                    @enderror
                    @error('egysegarv')
                        <div class="alert alert-danger">{{ $errors->first('egysegarv') }}</div>
                    @enderror
        <label for="mennyiseg">Mennyiség</label>
        <input type="number" id="mennyiseg" name="mennyiseg" value="{{ $beszerzes->mennyiseg }}"><br>
        @error('mennyiseg')
                        <div class="alert alert-danger">{{ $errors->first('mennyiseg') }}</div>
                    @enderror
                    @error('mennyisegv')
                        <div class="alert alert-danger">{{ $errors->first('mennyisegv') }}</div>
                    @enderror
      <button type="submit" class="btn btn-success">Mentés</button>
      <a href="/mvezeto/beszerzesek" class="button">Mégse</a>
    </form>
  </div>
</article>
</main>
</body>
</html>