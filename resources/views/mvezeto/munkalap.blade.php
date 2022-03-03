<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Adatfelvitel</title>
</head>
<body>
    <form action="munkalap" method="POST">
    <main class="grid-container">
        <header class="header">
            Adatok rögzítése
            
        </header>
        <aside class="item4">
            <a href="belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="rendeles">Rendelés</a>
            <a href="feladatok">Feladatok</a>
            <a href="munkak">Munkák</a>
        </nav>
        <article class="item3">
            <h2>Munkalap</h2>
            <form action="">
                <label for="munkaszam">Munkaszám</label>
                <input type="text" id="munkaszam" name="munkaszam"><br>
                <label for="ugyfel_nev">Ügyfél neve</label>
                <input type="text" id="ugyfel_nev" name="ugyfel_nev"><br>
                <label for="ugyfel_telefonszam">Ügyfél telefonszáma</label>
                <input type="number" id="ugyfel_telefonszam" name="ugyfel_telefonszam"><br>
                <label for="rendszam">Rendszám</label>
                <input type="text" id="rendszam" name="rendszam"><br>
                <label for="auto_erkezese">Autó érkezése</label>
                <input type="date" id="auto_erkezese" name="auto_erkezese"><br>
                <label for="munka_kezdete">Munka kezdete</label>
                <input type="date" id="munka_kezdete" name="munka_kezdete"><br>
                <label for="munka_vege">Munka vége</label>
                <input type="date" id="munka_vege" name="munka_vege"><br>
                <label for="auto_tavozasa">Autó távozása</label>
                <input type="date" id="auto_tavozasa" name="auto_tavozasa"><br>
                <label for="fizetendo_osszeg">Fizetendő összeg</label>
                <input type="number" id="fizetendo_osszeg" name="fizetendo_osszeg"><br>
                <input type="submit" value="Feltöltés">
              </form> 
        </article>
    </main>
</div>
</form>
</body>
</html>