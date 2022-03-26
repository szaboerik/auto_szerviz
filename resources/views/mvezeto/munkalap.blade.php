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
    <main class="grid-container">
        <header class="header">
            Munkalap
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
            <h2>Munkalap felvitele</h2>
            <form action="/api/munkalap" method="POST">
                @csrf
                <label for="m_szam">Munkaszám</label>
                <input type="number" id="m_szam" name="m_szam" readonly><br>
                <label for="ugyfel_neve">Ügyfél neve</label>
                <input type="text" id="ugyfel_neve" name="ugyfel_neve"><br>
                <label for="ugyfel_telszama">Ügyfél telefonszáma</label>
                <input type="text" id="ugyfel_telszama" name="ugyfel_telszama"><br>
                <label for="rendszam">Rendszám</label>
                <select name="rendszam" placeholder="ABC123">
                @foreach ($autos as $auto)
                <option value="{{ $auto->id }}">{{ $auto->rendszam }}</option>
                @endforeach
                </select><br>
                <label for="munka_kezdete">Munka kezdete</label>
                <input type="date" id="munka_kezdete" name="munka_kezdete" readonly><br>
                <label for="munka_vege">Munka vége</label>
                <input type="date" id="munka_vege" name="munka_vege" readonly><br>
                <label for="fizetendo">Fizetendő összeg</label>
                <input type="number" id="fizetendo" name="fizetendo" readonly><br>
                <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
              </form> 
        </article>
    </main>
</div>
</form>
</body>
</html>