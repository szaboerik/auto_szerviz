<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Beszerzés</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
        Beszerzés
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
            <h2>Beszerzés felvétele</h2>
            <form action="/api/beszerzes" method="POST">
                @csrf
                <label for="besz_azon">Beszerzés azonosító</label>
                <input type="number" id="besz_azon" name="besz_azon" readonly><br>
                <label for="f_szam">Feladatszám</label>
                <select name="f_szam">
                @foreach ($feladats as $feladat)
                <option value="{{ $feladat->f_szam }}">{{ $feladat->f_szam }}</option>
                @endforeach
                </select><br>
                <label for="alk_azon">Alkatrész</label>
                <select name="alk_azon">
                @foreach ($alkatreszs as $alkatresz)
                <option value="{{ $alkatresz->alk_azon }}">{{ $alkatresz->alk_azon }}</option>
                @endforeach
                </select><br>
                <label for="beszall_kod">Beszállító kód</label>
                <select name="beszall_kod">
                @foreach ($beszallitos as $beszallito)
                <option value="{{ $beszallito->beszall_kod }}">{{ $beszallito->beszall_kod }}</option>
                @endforeach
                </select><br>
                <label for="egyseg_ar">Egységár</label>
                <input type="number" id="egyseg_ar" name="egyseg_ar"><br>
                <label for="mennyiseg">Mennyiség</label>
                <input type="number" id="mennyiseg" name="mennyiseg"><br>
                <label for="besz_osszege">Beszerzés összege</label>
                <input type="number" id="besz_osszege" name="besz_osszege" readonly><br>
                
                <input type="submit" value="Feltöltés">
              </form> 
        </article>
    </main>
</div>
</body>
</html>