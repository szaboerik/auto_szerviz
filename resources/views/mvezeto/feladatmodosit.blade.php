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
        <input type="number" id="f_szam" name="f_szam" value="{{ $feladat->f_szam }}" readonly><br>
        <label for="m_szam">Munkaszám</label>
                <select name="m_szam">
                @foreach ($munkalaps as $munkalap)
                <option value="{{ $munkalap->m_szam }}">{{ $munkalap->m_szam }}</option>
                @endforeach
                </select><br>
                <label for="jelleg">Jelleg</label>
                <select name="jelleg">
                @foreach ($jellegs as $jelleg)
                <option value="{{ $jelleg->jelleg }}">{{ $jelleg->jelleg }}</option>
                @endforeach
                </select><br>
                <label for="d_kod">Szerelő</label>
                <select name="d_kod">
                @foreach ($dolgozos as $dolgozo)
                <option value="{{ $dolgozo->d_kod }}">{{ $dolgozo->d_kod }}</option>
                @endforeach
                </select><br>
        <label for="munkaora">Munkaóra</label>
        <input type="number" id="munkaora" name="munkaora" value="{{ $feladat->munkaora }}"><br>
      <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
    </form>
  </div>
</article>
</main>
</body>
</html>