<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Beszállító</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Beszállító
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
            <h2>Beszállító felvitele</h2>
            <form action="/api/beszallito" method="POST">
                @csrf
                  <label for="beszall_kod">Beszállító kód</label>
                  <input type="number" id="beszall_kod" name="beszall_kod" readonly><br>
                  <label for="nev">Neve</label>
                  <input type="text" id="nev" name="nev"><br>
                  <label for="irsz">Irányítószám</label>
                  <input type="number" id="irsz" name="irsz"><br>
                  <label for="cim">Lakcím</label>
                  <input type="text" id="cim" name="cim"><br>
                  <label for="elerhetoseg">Elérhetősége</label>
                  <input type="text" id="elerhetoseg" name="elerhetoseg" value="{{ old('elerhetoseg') }}" placeholder="+36701234567"><br>
                  @error('elerhetoseg')
                        <div class="alert alert-danger">{{ $errors->first('elerhetoseg') }}</div>
                    @enderror
                  <button type="submit" class="btn btn-success" style="width: 100%;">Mentés</button>
              </form> 
        </article>
    </main>
</div>
</body>
</html>