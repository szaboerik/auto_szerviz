<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
  <title>Dolgozó módosítása</title>
</head>
<body>
<main class="grid-container">
        <header class="header">
        Dolgozó módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
  <div style="width: 80%; margin: auto;">
    <form action="/api/dolgozo/{{ $dolgozo->id }}" method="POST">
      @csrf
      @method('put')
        <label for="d_kod">Dolgozó azonosító</label>
        <input type="number" id="d_kod" name="d_kod" value="{{ $dolgozo->d_kod }}"><br>
        <label for="dolg_nev">Dolgozó neve</label>
        <input type="text" id="dolg_nev" name="dolg_nev" value="{{ $dolgozo->dolg_nev }}"><br>
        <label for="kepesseg">Képesség</label>
        <input type="text" id="kepesseg" name="kepesseg" value="{{ $dolgozo->kepesseg }}"><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
  </div>
</article>
</main>
</body>
</html>