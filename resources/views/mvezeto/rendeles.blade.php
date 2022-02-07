<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Rendelés</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Rendelés
            
        </header>
        <aside class="item4">
            <a href="belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="munkalap">Munkalap</a>
            <a href="feladatok">Feladatok</a>
            <a href="munkak">Munkák</a>
        </nav>
        <article class="item3">
            <h2>Munkalap</h2>
            <form action="">
                <label for="bazon">Beszerzés azonosító</label>
                <input type="text" id="bazon" name="bazon"><br>
                <label for="fszam">Feladatszám</label>
                <input type="text" id="fszam" name="fszam"><br>
                <label for="alk">Alkatrész</label>
                <input type="text" id="alk" name="alk"><br>
                <label for="bkod">Beszállító kód</label>
                <input type="text" id="bkod" name="bkod"><br>
                <label for="ar">Egységár</label>
                <input type="number" id="ar" name="ar"><br>
                <label for="db">Mennyiség</label>
                <input type="number" id="db" name="db"><br>
                <label for="rendel">Megrendelve</label>
                <input type="date" id="rendel" name="rendel"><br>
                <label for="atveve">Átvéve</label>
                <input type="date" id="atveve" name="atveve"><br>
                <input type="submit" value="Feltöltés">
              </form> 
        </article>
    </main>
</div>
</body>
</html>