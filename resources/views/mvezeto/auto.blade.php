<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Autó</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Autó
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="alkatreszek">Alkatrészek</a>
            <a href="autok">Autók</a>
            <a href="beszallitok">Beszállítók</a>
            <a href="beszerzesek">Beszerzések</a>
            <a href="dolgozok">Dolgozók</a>
            <a href="feladatok">Feladatok</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
            <a href="munkak">Munkalapok</a>
        </nav>
        <article class="item3">
            <h2>Autó felvitele</h2>
            <form action="/api/auto" method="POST">
                @csrf
                  <label for="rendszam">Rendszám</label>
                  <input type="text" id="rendszam" name="rendszam" ><br>
                  <label for="markaId">Márka</label>
                <select name="markaId" placeholder="ABC123">
                @foreach ($markas as $marka)
                <option value="{{ $marka->id }}">{{ $marka->marka }}</option>
                @endforeach
                </select><br>
                  <label for="forgalmi">Forgalmi</label>
                  <input type="text" id="forgalmi" name="forgalmi"><br>
                  <label for="evjarat">Évjárat</label>
                  <input type="number" id="evjarat" name="evjarat"><br>
                  <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
              </form> 
        </article>
    </main>
</div>
</body>
</html>