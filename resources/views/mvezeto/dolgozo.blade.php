<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Dolgozó</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Dolgozó
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="alkatreszek">Alkatrészek</a>
            <a href="autok">Autók</a>
            <a href="beszallitok">Beszállítók</a>
            <a href="dolgozok">Dolgozók</a>
            <a href="feladatok">Feladatok</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
            <a href="munkak">Munkalapok</a>
            <a href="rendelesek">Rendelések</a>
        </nav>
        <article class="item3">
            <h2>Dolgozó felvitele</h2>
            <form action="/api/dolgozo" method="POST">
                @csrf
                  <label for="d_kod">Dolgozó azonosító</label>
                  <input type="number" id="d_kod" name="d_kod" readonly><br>
                  <label for="dolg_nev">Dolgozó neve</label>
                  <input type="text" id="dolg_nev" name="dolg_nev"><br>
                  <label for="kepesseg">Képesség</label>
                  <input type="text" id="kepesseg" name="kepesseg"><br>
                  <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
              </form> 
        </article>
    </main>
</div>
</body>
</html>