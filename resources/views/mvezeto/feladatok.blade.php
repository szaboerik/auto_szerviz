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
            <a href="alkatreszek">Alkatrészek</a>
            <a href="autok">Autók</a>
            <a href="beszallitok">Beszállítók</a>
            <a href="dolgozok">Dolgozók</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
            <a href="munkak">Munkalapok</a>
            <a href="rendelesek">Rendelések</a>
        </nav>
        <article class="item3">
            <h2>Feladatok</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Feladatszám</th>
        <th>Munkaszám</th>
        <th>Jelleg</th>
        <th>Szerelő</th>
        <th>Munkaóra</th>
        <th>Beszerzés összege</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($feladats as $feladat): ?>
        <tr>
          <th>{{ $feladat->f_szam}}</th>
          <td>{{ $feladat->m_szam }}</td>
          <td>{{ $feladat->jelleg }}</td>
          <td>{{ $feladat->szerelo }}</td>
          <td>{{ $feladat->munkaora }}</td>
          <td>{{ $feladat->besz_osszege }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/feladatmodosit/{{ $feladat->f_szam }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/feladat/{{ $feladat->f_szam }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
          </td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
    <div><a href="/mvezeto/feladat"><button class="btn btn-sm btn-success">Új feladat létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>