<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
  <title>Feladat módosítása</title>
</head>
<body>
<main class="grid-container">
        <header class="header">
            Feladat módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
  <div style="width: 80%; margin: auto;">
    <form action="/api/feladat/{{ $feladat->f_szam }}" method="POST">
      @csrf
      @method('put')
        <label for="f_szam">Feladatszám</label>
        <input type="text" id="f_szam" name="f_szam" value="{{ $feladat->f_szam }}" readonly><br>
        <label for="m_szam">Munkaszám</label>
        <input type="text" id="m_szam" name="m_szam" value="{{ $feladat->m_szam }}"><br>
        <label for="jelleg">Jelleg</label>
        <input type="text" id="jelleg" name="jelleg" value="{{ $feladat->jelleg }}"><br>
        <label for="szerelo">Szerelő</label>
        <input type="text" id="szerelo" name="szerelo" value="{{ $feladat->szerelo }}"><br>
        <label for="munkaora">Munkaóra</label>
        <input type="text" id="munkaora" name="munkaora" value="{{ $feladat->munkaora }}"><br>
        <label for="besz_osszege">Beszerzési összeg</label>
        <input type="text" id="besz_osszege" name="besz_osszege" value="{{ $feladat->besz_osszege }}"><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
  </div>
</article>
</main>
</body>
</html>