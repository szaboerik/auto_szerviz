<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Jellegek</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Jelleg
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
            <h2>Jelleg felvitele</h2>
            <form action="/api/jelleg" method="POST">
                @csrf
                  <label for="jelleg">Jelleg</label>
                  <input type="text" id="jelleg" name="jelleg" readonly><br>
                  <label for="anyag_e">Beszerzéssel jár?</label>
                  <input type="text" id="anyag_e" name="anyag_e"><br>
                  <label for="elnevezes">Elnevezés</label>
                  <input type="text" id="elnevezes" name="elnevezes"><br>
                  <label for="oradij">Óradíj</label>
                  <input type="number" id="oradij" name="oradij"><br>
                  <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
              </form> 
        </article>
    </main>
</div>
</body>
</html>