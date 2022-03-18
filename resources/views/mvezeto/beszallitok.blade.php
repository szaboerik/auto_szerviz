<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Beszállítók</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
        Beszállítók
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="alkatreszek">Alkatrészek</a>
            <a href="autok">Autók</a>
            <a href="dolgozok">Dolgozók</a>
            <a href="feladatok">Feladatok</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
            <a href="munkak">Munkalapok</a>
            <a href="rendelesek">Rendelések</a>
        </nav>
        <article class="item3">
            <h2>Beszállítók</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Beszállító kód</th>
        <th>Neve</th>
        <th>Irányítószám</th>
        <th>Lakcím</th>
        <th>Elérhetősége</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($beszallitos as $beszallito): ?>
        <tr>
          <th>{{ $beszallito->beszall_kod }}</th>
          <td>{{ $beszallito->nev }}</td>
          <td>{{ $beszallito->irsz }}</td>
          <td>{{ $beszallito->cim }}</td>
          <td>{{ $beszallito->elerhetoseg }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/beszallitomodosit/{{ $beszallito->id }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/beszallito/{{ $beszallito->id }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
          </td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
    <div><a href="/mvezeto/beszallito"><button class="btn btn-sm btn-success">Új beszállító létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>