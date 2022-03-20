<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
  <title>Munkalap módosítása</title>
</head>
<body>
<main class="grid-container">
        <header class="header">
            Munka módosítása
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <article class="item3">
  <div style="width: 80%; margin: auto;">
    <form action="/api/munkalap/{{ $munkalap->m_szam }}" method="POST">
      @csrf
      @method('put')
        <label for="m_szam">Munkaszám</label>
        <input type="number" id="m_szam" name="m_szam" value="{{ $munkalap->m_szam }}" readonly><br>
        <label for="ugyfel_neve">Ügyfél neve</label>
        <input type="text" id="ugyfel_neve" name="ugyfel_neve" value="{{ $munkalap->ugyfel_neve }}"><br>
        <label for="ugyfel_telszama">Ügyfél telefonszáma</label>
        <input type="text" id="ugyfel_telszama" name="ugyfel_telszama" value="{{ $munkalap->ugyfel_telszama }}"><br>
        <label for="rendszam">Rendszám</label>
                <select name="rendszam" placeholder="ABC123">
                @foreach ($autos as $auto)
                <option value="{{ $auto->id }}" {{$auto->id == $munkalap->auto->id ? 'selected' : ''}}>{{ $auto->rendszam }} </option>
                @endforeach
                </select><br>
        <label for="munka_kezdete">Munka kezdete</label>
        <input type="date" id="munka_kezdete" name="munka_kezdete" value="{{ $munkalap->munka_kezdete }}"readonly><br>
        <label for="munka_vege">Munka vége</label>
        <input type="date" id="munka_vege" name="munka_vege" value="{{ $munkalap->munka_vege }}"><br>
        <label for="fizetendo">Fizetendő</label>
        <input type="number" id="fizetendo" name="fizetendo" value="{{ $munkalap->fizetendo }}"><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
</div>
</article>
</main>
</body>
</html>