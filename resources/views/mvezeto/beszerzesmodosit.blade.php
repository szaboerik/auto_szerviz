<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
  <title>Beszerzés módosítása</title>
</head>
<body>
<main class="grid-container">
        <header class="header">
        Beszerzés módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
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
                <option value="{{ $feladat->f_szam }}">{{ $feladat->f_szam }}</option>
                @endforeach
                </select><br>
                <label for="alk_azon">Alkatrész</label>
                <select name="alk_azon">
                @foreach ($alkatreszs as $alkatresz)
                <option value="{{ $alkatresz->alk_azon }}">{{ $alkatresz->alk_azon }}</option>
                @endforeach
                </select><br>
                <label for="beszall_kod">Beszállító kód</label>
                <select name="beszall_kod">
                @foreach ($beszallitos as $beszallito)
                <option value="{{ $beszallito->beszall_kod }}">{{ $beszallito->beszall_kod }}</option>
                @endforeach
                </select><br>
        <label for="egyseg_ar">Egységár</label>
        <input type="number" id="egyseg_ar" name="egyseg_ar" value="{{ $beszerzes->egyseg_ar }}"><br>
        <label for="mennyiseg">Mennyiség</label>
        <input type="number" id="mennyiseg" name="mennyiseg" value="{{ $beszerzes->mennyiseg }}"><br>
        <label for="besz_osszege">Beszerzés összege</label>
        <input type="number" id="besz_osszege" name="besz_osszege" value="{{ $beszerzes->besz_osszege }}" readonly><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
  </div>
</article>
</main>
</body>
</html>