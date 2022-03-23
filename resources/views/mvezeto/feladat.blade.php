<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Feladatok</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Feladat
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
            <h2>Feladat felvitele</h2>
            <form action="/api/feladat" method="POST">
                @csrf
                  <label for="f_szam">Feladatszám</label>
                  <input type="number" id="f_szam" name="f_szam" readonly><br>
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
                  <input type="number" id="munkaora" name="munkaora"><br>
                  <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
              </form> 
        </article>
    </main>
</div>
</body>
</html>