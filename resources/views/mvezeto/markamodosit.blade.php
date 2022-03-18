<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
  <title>Márka módosítása</title>
</head>
<body>
<main class="grid-container">
        <header class="header">
            Márka módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
  <div style="width: 80%; margin: auto;">
    <form action="/api/marka/{{ $marka->id }}" method="POST">
      @csrf
      @method('put')
        <label for="marka">Márka</label>
        <input type="text" id="marka" name="marka" value="{{ $marka->marka }}"><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
  </div>
</article>
</main>
</body>
</html>