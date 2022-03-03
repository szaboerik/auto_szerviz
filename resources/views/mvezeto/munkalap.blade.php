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
            <a href="rendelesek">Rendelések</a>
        </nav>
        <article class="item3">
            <h2>Munkalap</h2>
            <form action="">
                <label for="mszam">Munkaszám</label>
                <input type="text" id="mszam" name="mszam"><br>
                <label for="ugyfnev">Ügyfél neve</label>
                <input type="text" id="ugyfnev" name="ugyfnev"><br>
                <label for="ugyftel">Ügyfél telefonszáma</label>
                <input type="number" id="ugyftel" name="ugyftel"><br>
                <label for="rendsz">Rendszám</label>
                <input type="text" id="rendsz" name="rendsz"><br>
                <label for="autoerk">Autó érkezése</label>
                <input type="date" id="autoerk" name="autoerk"><br>
                <label for="mkezd">Munka kezdete</label>
                <input type="date" id="mkezd" name="mkezd"><br>
                <label for="mvege">Munka vége</label>
                <input type="date" id="mvege" name="mvege"><br>
                <label for="autotav">Autó távozása</label>
                <input type="date" id="autotav" name="autotav"><br>
                <label for="fizetendo">Fizetendő összeg</label>
                <input type="number" id="fizetendo" name="fizetendo"><br>
                <input type="submit" value="Feltöltés">
              </form> 
        </article>
    </main>
</div>
</form>
</body>
</html>