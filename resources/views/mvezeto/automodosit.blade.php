<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
  <title>Autó módosítása</title>
</head>
<body>
<main class="grid-container">
        <header class="header">
            Autó módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
  <div style="width: 80%; margin: auto;">
    <form action="/api/auto/{{ $auto->id }}" method="POST">
      @csrf
      @method('put')
        <label for="rendszam">Rendszám</label>
        <input type="text" id="rendszam" name="rendszam" value="{{ $auto->rendszam }}"><br>
        <label for="markaId">Márkaid</label>
                <select name="markaId" placeholder="ABC123">
                @foreach ($markas as $marka)
                <option value="{{ $marka->id }}">{{ $marka->marka }}</option>
                @endforeach
                </select><br>
        <label for="forgalmi">Forgalmi</label>
        <input type="text" id="forgalmi" name="forgalmi" value="{{ $auto->forgalmi }}"><br>
        <label for="evjarat">Évjárat</label>
        <input type="number" id="evjarat" name="evjarat" value="{{ $auto->evjarat }}"><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
  </div>
</article>
</main>
</body>
</html>