<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stilus.css') }}" >
    <title>Dolgozók</title>
</head>
<body>
    <main class="grid-container">
        <header class="header">
        Dolgozók
        </header>
        <aside class="item4">
            <a href="/belepes">Kijelentkezés</a>
        </aside>
        <nav class="item2">
            <a href="alkatreszek">Alkatrészek</a>
            <a href="autok">Autók</a>
            <a href="beszallitok">Beszállítók</a>
            <a href="feladatok">Feladatok</a>
            <a href="jellegek">Jellegek</a>
            <a href="markak">Márkák</a>
            <a href="munkak">Munkalapok</a>
            <a href="rendelesek">Rendelések</a>
        </nav>
        <article class="item3">
            <h2>Dolgozók</h2>
            <table class="table">
    <thead>
      <tr>
        <th>Dolgozó azonosító</th>
        <th>Dolgozó neve</th>
        <th>Képesség</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($dolgozos as $dolgozo): ?>
        <tr>
          <th>{{ $dolgozo->d_kod}}</th>
          <td>{{ $dolgozo->dolg_nev }}</td>
          <td>{{ $dolgozo->kepesseg }}</td>
          <td style="display: flex;">
            <a href="/mvezeto/dolgozomodosit/{{ $dolgozo->id }}"><button class="btn btn-sm btn-info">Szerkesztés</button></a>
            <a><form action="/api/dolgozo/{{ $dolgozo->id }}" method="POST">@csrf @method('delete')<button type="submit" class="btn btn-sm btn-danger">Törlés</button></form></a>
          </td>
        </tr>
        <?php endforeach; ?> 
    </tbody>
    <div><a href="/mvezeto/dolgozo"><button class="btn btn-sm btn-success">Új dolgozó létrehozása</button></a></div>
  </table>
        </article>
    </main>
</div>
</body>
</html>