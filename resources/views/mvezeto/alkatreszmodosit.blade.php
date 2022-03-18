<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
  <title>Alkatrész módosítása</title>
</head>
<body>
<main class="grid-container">
        <header class="header">
            Alkatrész módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
  <div style="width: 80%; margin: auto;">
    <form action="/api/alkatresz/{{ $alkatresz->id }}" method="POST">
      @csrf
      @method('put')
        <label for="alk_azon">Alkatrész azonosító</label>
        <input type="number" id="alk_azon" name="alk_azon" value="{{ $alkatresz->alk_azon }}"><br>
        <label for="alk_neve">Alkatrész neve</label>
        <input type="text" id="alk_neve" name="alk_neve" value="{{ $alkatresz->alk_neve }}"><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
  </div>
</article>
</main>
</body>
</html>