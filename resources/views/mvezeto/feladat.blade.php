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
            Feladatok
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="feladatok">Feladatok</a>
            <a href="rendelesek">Rendelések</a>
            <a href="munkak">Munkalapok</a>
        </nav>
        <article class="item3">
            <h2>Feladatok</h2>
            <form action="">
                @csrf
                  <label for="fszam">Feladatszám</label>
                  <input type="number" id="fszam" name="fszam"><br>
                  <label for="m_szam">Munkaszám</label>
                  <input type="number" id="m_szam" name="m_szam"><br>
                  <label for="jelleg">Jelleg</label>
                  <input type="number" id="jelleg" name="jelleg"><br>
                  <label for="szerelo">Szerelő</label>
                  <input type="number" id="szerelo" name="szerelo"><br>
                  <label for="munkaora">Munkaóra</label>
                  <input type="number" id="munkaora" name="munkaora"><br>
                  <label for="besz_osszege">Beszerzés összege</label>
                  <input type="number" id="besz_osszege" name="besz_osszege"><br>
                  <input type="submit" value="Feltöltés">
              </form> 
        </article>
    </main>
</div>
</body>
</html>