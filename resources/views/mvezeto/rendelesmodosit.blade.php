<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
  <title>Rendelés módosítása</title>
</head>
<body>
<main class="grid-container">
        <header class="header">
            Rendelés módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
  <div style="width: 80%; margin: auto;">
    <form action="/api/rendeles/{{ $beszerzes->besz_azon }}" method="POST">
      @csrf
      @method('put')
        <label for="besz_azon">Beszerzés azonosító</label>
        <input type="number" id="besz_azon" name="besz_azon" value="{{ $beszerzes->besz_azon }}"><br>
        <label for="f_szam">Feladatszám</label>
        <input type="number" id="f_szam" name="f_szam" value="{{ $beszerzes->f_szam }}"><br>
        <label for="alkatresz">Alkatrész</label>
        <input type="number" id="alkatresz" name="alkatresz" value="{{ $beszerzes->alkatresz }}"><br>
        <label for="beszall_kod">Beszállító kód</label>
        <input type="number" id="beszall_kod" name="beszall_kod" value="{{ $beszerzes->beszall_kod }}"><br>
        <label for="egyseg_ar">Egységár</label>
        <input type="number" id="egyseg_ar" name="egyseg_ar" value="{{ $beszerzes->egyseg_ar }}"><br>
        <label for="mennyiseg">Mennyiség</label>
        <input type="number" id="mennyiseg" name="mennyiseg" value="{{ $beszerzes->mennyiseg }}"><br>
        <label for="besz_osszege">Beszerzés összege</label>
        <input type="number" id="besz_osszege" name="besz_osszege" value="{{ $beszerzes->besz_osszege }}"><br>
        <label for="atveve">Átvéve</label>
        <input type="number" id="atveve" name="atveve" value="{{ $beszerzes->atveve }}"><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
  </div>
</article>
</main>
</body>
</html>