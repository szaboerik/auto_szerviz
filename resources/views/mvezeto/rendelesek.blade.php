<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Rendelések</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
            Rendelések
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="alkatreszek">Alkatrészek</a>
            <a href="autok">Autók</a>
            <a href="beszallitok">Beszállítók</a>
            <a href="dolgozok">Dolgozók</a>
            <a href="feladatok">Feladatok</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
            <a href="munkak">Munkalapok</a>
        </nav>
        <article class="item3">
            <h2>Rendelések</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Beszerzés azonosító</th>
        <th>Feladatszám</th>
        <th>Alkatrész</th>
        <th>Beszállító kód</th>
        <th>Egységár</th>
        <th>Mennyiség</th>
        <th>Beszerzés összege</th>
        <th>Átvéve</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($beszerzess as $beszerzes): ?>
        <tr>
          <th>{{ $beszerzes->besz_azon}}</th>
          <td>{{ $beszerzes->f_szam }}</td>
          <td>{{ $beszerzes->alkatresz }}</td>
          <td>{{ $beszerzes->beszall_kod }}</td>
          <td>{{ $beszerzes->egyseg_ar }}</td>
          <td>{{ $beszerzes->mennyiseg }}</td>
          <td>{{ $beszerzes->besz_osszege }}</td>
          <td>{{ $beszerzes->atveve }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/rendelesmodosit/{{ $beszerzes->besz_azon }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/rendeles/{{ $beszerzes->besz_azon }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
          </td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
    <div><a href="/mvezeto/rendeles"><button class="btn btn-sm btn-success">Új rendelés létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>