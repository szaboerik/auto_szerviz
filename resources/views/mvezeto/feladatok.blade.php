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
            <a href="belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="munkalap">Munkalap</a>
            <a href="rendeles">Rendelés</a>
            <a href="munkak">Munkák</a>
        </nav>
        <article class="item3">
            <h2>Feladatok</h2>
            <form action="">
                <label for="mszam">Munka szám</label>
                <select name="mszam" id="mszam" form="feladatform">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select><br>
                  <label for="fszam">Feladatszám</label>
                  <input type="text" id="fszam" name="fszam"><br>
                  <label for="jelleg">Jelleg</label>
                  <input type="text" id="jelleg" name="jelleg"><br>
                  <label for="szerelo">Szerelő</label>
                  <input type="text" id="szerelo" name="szerelo"><br>
                  <label for="mora">Munkaóra</label>
                  <input type="number" id="mora" name="mora"><br>
                  <input type="submit" value="Feltöltés">


              </form> 
        </article>
    </main>
</div>
</body>
</html>