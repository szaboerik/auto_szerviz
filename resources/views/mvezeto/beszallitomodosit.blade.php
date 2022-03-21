<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
  <title>Beszállító módosítása</title>
</head>
<body>
<main class="grid-container">
        <header class="header">
        Beszállító módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
  <div style="width: 80%; margin: auto;">
    <form action="/api/beszallito/{{ $beszallito->beszall_kod }}" method="POST">
      @csrf
      @method('put')
        <label for="beszall_kod">Beszállító kód</label>
        <input type="number" id="beszall_kod" name="beszall_kod" value="{{ $beszallito->beszall_kod }}" readonly><br>
        <label for="nev">Neve</label>
        <input type="text" id="nev" name="nev" value="{{ $beszallito->nev }}"><br>
        <label for="irsz">Irányítószám</label>
        <input type="text" id="irsz" name="irsz" value="{{ $beszallito->irsz }}"><br>
        <label for="cim">Lakcím</label>
        <input type="text" id="cim" name="cim" value="{{ $beszallito->cim }}"><br>
        <label for="elerhetoseg">Elérhetősége</label>
        <input type="text" id="elerhetoseg" name="elerhetoseg" value="{{ $beszallito->elerhetoseg }}"><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
  </div>
</article>
</main>
</body>
</html>